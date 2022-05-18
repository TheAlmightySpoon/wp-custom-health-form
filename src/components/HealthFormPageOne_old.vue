<template>
  <v-form v-model="valid" ref="form" lazy-validation>
    <v-container fill-height>
      <v-row justify="center">
        <v-col cols="10">
          <h1 class="text-center">{{pageOneHeadings.headingOne}}</h1>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="10">
          <v-text-field
            solo
            v-model="formData.myHeight"
            label="My height is about"
            :rules="heightRules"
            required
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="10">
          <h2>{{pageOneHeadings.subHeadingOne}}</h2>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="10">
          <v-text-field
            solo
            v-model="formData.myWeight.sixMonths"
            label="6 months ago I weighed about"
            required
          ></v-text-field>
        </v-col>
        <v-col cols="10">
          <v-text-field
            solo
            v-model="formData.myWeight.oneMonth"
            label="1 month ago I weighed about"
            required
          ></v-text-field>
        </v-col>
        <v-col cols="10">
          <v-text-field
            solo
            v-model="formData.myWeight.currentMonth"
            label="Currently I weigh about"
            required
          ></v-text-field>
        </v-col>
        <v-col cols="10">
          <v-text-field
            solo
            v-model="formData.myWeight.loss"
            label="This gives you a weight loss of"
            required
            disabled
          ></v-text-field>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="10">
          <h2>{{pageOneHeadings.subHeadingTwo}}</h2>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-radio-group
            v-model="formData.row"
            row
        >      <v-radio
              label="Increased"
              value="0z"
            ></v-radio>   
       
          <v-radio
              label="Unchanged"
              value="0"
            ></v-radio>
          <v-radio
              label="Decreased"
              value="1"
            ></v-radio>
        </v-radio-group>
      </v-row>
      <v-row justify="center">
          <v-col cols="10">
              <v-simple-table>
                  <thead>
                      <tr>
                        <th>Weight loss in 1 month</th>
                        <th>Score</th>
                        <th>Weight loss in 6 months</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr
                        v-for="item in scoreTable"
                        :key="item.score"
                        >
                        <td>{{ item.one }}</td>
                        <td>{{ item.score }}</td>
                        <td>{{ item.six }}</td>
                        </tr>
                  </tbody>
              </v-simple-table>
          </v-col>
      </v-row>
      <v-row justify="end">
        <v-col cols="3">
          <v-btn block plain v-on:click="submitForm">Next <v-img contain src="../assets/chev.png" height="40" width="40" max-width="40"></v-img></v-btn>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
  export default {
    props: [ 'pageOneHeadings',],
    data: () => ({
      valid: true,
      formData : {
        myHeight: '',
        myWeight: {
          sixMonths : null,
          oneMonth : null,
          currentMonth : null,
          loss: null,
        },
        row: null
      },
      firstname: '',
      lastname: '',
      heightRules: [
        v => !!v || 'Height is required',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid',
      ],
      scoreTable: [
          {
            one: '10% or greater',
            score: 4,
            six : '20% or greater'
          },
          {
            one: '5-9.9%',
            score: 3,
            six : '10-19.9%'
          },
          {
            one: '3-4.9%',
            score: 2,
            six : '6-9.9%'
          },
          {
            one: '2-2.9%',
            score: 1,
            six : '2-5.9%'
          },
          {
            one: '1-1.9%',
            score: 0,
            six : '0-1.9%'
          },
      ],
    }),
    watch: {
      formData: {
        handler(){
          this.$emit('formOne', this.formData)
        },
        deep: true
      }
    },
    methods: {
      submitForm () {
        this.$refs.form.validate()
      },
      emitToParent () {
        this.$emit('formOne', this.formData)
      }
    }
  }
</script>
<!--
My height is about
<h2>Weight History</h2>
6 months ago I weighed
1 month ago I weighed
Currently I weigh
This gives you a weight loss of (Calc())
<h2>During the past 2 weeks my weight has:</h2>
Increased []
Unchanged []
Decreased []


-->