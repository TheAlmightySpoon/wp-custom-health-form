<template>
    <v-container fill-height id="printMe">
      <v-btn fab top right absolute dark class="print-icon background-purple d-print-none" elevation="0" @click="print" v-if="$vuetify.breakpoint.smAndDown"><v-icon dark>mdi-printer</v-icon></v-btn>    
      <v-btn fab top right absolute dark class="email-icon btn-blue d-print-none" elevation="0" @click="dialog=true" v-if="$vuetify.breakpoint.smAndDown"><v-icon dark>mdi-email</v-icon></v-btn>
      <v-row justify="center">
        <v-col cols="10">
          <h2 class="text-center">These are your survey results</h2>
        </v-col>
        
      </v-row>
      <v-row justify="center">
        <v-col cols="10">
          <h3 class="text-center">Based on the information you have entered</h3>
        </v-col>
      </v-row>

      <v-row justify="center" no-gutters>
        <v-col cols="1" md="3">
        </v-col>
        <v-col cols="10" md="6">
          <v-simple-table>
            <tr class="background-grey">
              <td>
                 <h4 class="text-center padded">Your BMI is <b>{{Math.abs(BMI).toFixed(2)}} kg/m&sup2;</b></h4>
              </td>
            </tr>
          </v-simple-table>
        </v-col>
        <v-col cols="1" md="3">
        </v-col>
      </v-row>
      <v-row justify="center" no-gutters>
        <v-col cols="1" md="3">
        </v-col>
        <v-col cols="10" md="6">
          <v-simple-table>
            <tr class="background-grey">
              <td>
                 <h4 class="text-center padded">Your unplanned weight loss is <b>{{UWL}}%</b></h4>
              </td>
            </tr>
          </v-simple-table>
        </v-col>
        <v-col cols="1" md="3">
        </v-col>
      </v-row>
      <v-row justify="center" no-gutters>
        <v-col cols="1" md="3">
        </v-col>
        <v-col cols="10" md="6">
          <v-simple-table>
            <tr class="background-grey">
              <td>
                 <h4 class="text-center padded">This suggests a <b>{{MUST}}</b> risk of being malnourished</h4>
              </td>
            </tr>
          </v-simple-table>
        </v-col>
        <v-col cols="1" md="3">
          <v-row justify="end" no-gutters>
            <v-col cols="auto">
              <v-btn fab top right dark class="long background-purple d-print-none" elevation="0" @click="print" v-if="$vuetify.breakpoint.mdAndUp">Print Answers</v-btn>
              
            </v-col>
          </v-row>
          <v-row justify="end" no-gutters>
            <v-col cols="auto">
              <v-btn fab top right dark class="long email btn-blue d-print-none" elevation="0" v-if="$vuetify.breakpoint.mdAndUp" @click="dialog=true">Email Answers</v-btn>
              
            </v-col>
          </v-row>
        </v-col>
      </v-row>

      <v-row justify="end" class="d-print-none">
        <v-col cols="12" md="3">
          <v-btn block plain v-on:click="emitToParent"><v-img contain :src="src" height="40" width="40" max-width="40"></v-img> Start Again</v-btn>
        </v-col>
      </v-row>
      <v-dialog
      v-model="dialog"
      width="500"
    >
      <v-card>
        <v-card-title class="text-h5 grey lighten-2">
          Email Results
        </v-card-title>

        <v-card-text>
          <v-form v-model="valid" ref="form" lazy-validation>
            <v-text-field
              v-model="email"
              :rules="emailRules"
              label="E-mail"
              required
            ></v-text-field>
          </v-form>
        </v-card-text>

        <v-divider></v-divider>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn
            color="primary"
            text
            @click="dialog=false"
          >
            Cancel
          </v-btn>
          <v-btn
            color="primary"
            text
            @click="submitForm"
          >
            Send
          </v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
    </v-container>
</template>

<script>
  export default {
    props: [ 'pageResultHeadings', 'score', 'BMI', 'UWL', 'MUST', 'links'],
    data: () => ({
      api : './../wp-content/plugins/wp-vue-weight-form/wp-vue-email.php',
      row1 : [],
      src: require('./../assets/chevBack.png'),
      dialog: false,
      valid: true,
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
      ],
    }),
    methods : {
      submitForm () {
        if(this.$refs.form.validate()) {
          // send email
          this.sendMail()
          this.dialog = false
        }
      },
      print() {
        this.$htmlToPaper('printMe');
      },
      getBMI() {
        // weight / (height x height)
      },
      getUWL() {
        // ((previous weight - current weight) / current weight) * 100
      },
      getMUST() {
        var scoreBMI, scoreWL, scoreADE;
        // Score from page one + BMI score + weight loss score
        console.log(scoreBMI + scoreWL + scoreADE)
      },
      emitToParent () {
        this.$emit('formResult', this.valid)
      },
      sendMail () {
        this.axios
        .post(
            this.api,
            {
              name : 'jon',
              bmi : Math.abs(this.BMI).toFixed(2),
              uwl : this.UWL,
              must : this.MUST,
              email : this.email
            }
        )
        .then(res => {
            this.sent = true;
            console.log(res);
        });
      }
    }
  }
</script>