<template>
  <v-form v-model="valid">
    <v-btn-toggle
        v-model="howFeeling"
        multiple
      >
    <v-container fill-height>
      
      <v-row justify="center">
        <v-col cols="10">
          <h2 class="text-center">{{pageThreeHeadings.headingOne}}</h2>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="10">
          <h3 class="text-center">{{pageThreeHeadings.subHeadingOne}}</h3>
        </v-col>
      </v-row>
      
      <v-row justify="center">
        <v-col v-for="item in this.feels" :key="item" cols="12" md="4">
          <v-btn large block rounded dark class="gradient-bg" active-class="btn-orange">
              {{item}}
          </v-btn>
        </v-col>
      </v-row>

      <v-row justify="center">
        <v-col cols="12">
          <v-alert
            v-model="alert"
            color="red"
            type="warning"
            block
            class="text-center"
            prominent
            transition="scale-transition"
          >Please tell your Cancer Specialist Nurse about this problem</v-alert>
        </v-col>
      </v-row>
      <v-row justify="space-between">
        <v-col cols="12" md="3">
          <v-btn block plain v-on:click="goBack"><v-img contain :src="srcBack" height="40" width="40" max-width="40"></v-img> Back</v-btn>
        </v-col>
        <v-col cols="12" md="3">
          <v-btn block plain v-on:click="emitToParent">Get results <v-img contain :src="src" height="40" width="40" max-width="40"></v-img></v-btn>
        </v-col>
      </v-row>
      
    </v-container>
    </v-btn-toggle>
  </v-form>
</template>

<script>
  export default {
    props: [ 'pageThreeHeadings', 'feels'],
    data: () => ({
      valid : false,
      src: require('./../assets/chev.png'),
      srcBack: require('./../assets/chevBack.png'),
      alert : false,
      howFeeling : []
    }),
    watch: {
      howFeeling: {
        handler() {
          if(this.howFeeling.length>0) {
            this.alert = true
          }else{
            this.alert = false
          }
        }
      }
    },
    methods: {
      emitToParent () {
        this.$emit('formThree', this.howFeeling)
      },
      goBack() {
        this.$emit('goBack')
      },
    }
  }
</script>