<template>
  <v-form v-model="valid">
    <v-container fill-height>
      <v-row justify="center">
        <v-col cols="10">
          <h1 class="text-center">{{pageFourHeadings.headingOne}}</h1>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="10">
          <h2 class="text-center">{{pageFourHeadings.subHeadingOne}}</h2>
        </v-col>
      </v-row>
      <v-radio-group
            v-model="formData"
            row
        >  
      <v-row justify="center">
          <v-col cols="3">
            <v-radio
              label="Normal with no limits"
              value="0"
            ></v-radio>
          </v-col>
          <v-col cols="3">
            <v-radio
              label="Not my normal self but ale to be up and about with fairly normal activity level"
              value="1"
            ></v-radio>
          </v-col>
          <v-col cols="3">
            <v-radio
              label="Not feeling up to most things but in bed or chair less than half the day"
              value="2"
            ></v-radio>
          </v-col>
        </v-row>
        <v-row justify="center">
          <v-col cols="3">
            <v-radio
              label="Able to do little activity and spend most of the day in bed or chair"
              value="3"
            ></v-radio>
          </v-col>
          <v-col cols="3">
            <v-radio
              label="Pretty much bed ridden"
              value="3s"
            ></v-radio>
          </v-col>
          <v-col cols="3">
              
          </v-col>
        </v-row>
      </v-radio-group>
    </v-container>
  </v-form>
</template>

<script>
  export default {
    props: [ 'pageFourHeadings',],
    data: () => ({
      valid : false,
      formData : 0,
    }),
    watch: {
      formData: {
        handler(){
          this.$emit('formFour', this.formData)
        },
        deep: true
      }
    },
    methods: {
      emitToParent () {
        this.$emit('formFour', this.formData)
      }
    }
  }
</script>