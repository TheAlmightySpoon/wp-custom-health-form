<template>
  
    <v-container fill-height>
      
      <v-row justify="center">
        <v-col cols="10">
          <h2 class="text-center">{{pageOneHeadings.headingOne}}</h2>
        </v-col>
      </v-row>

      <v-row justify="center">
        <v-col cols="10">
          <v-form v-model="valid" ref="form" lazy-validation>
            <v-row justify="center">
              <v-col cols="12" md="4">
                My height is
              </v-col>
              <v-col cols="12" md="4" v-if="formData.heightUnits=='metric'">
                <v-text-field
                  solo
                  v-model="formData.myHeight.meters"
                  label="meters"
                  :rules="heightRules"
                  required
                  type="number"
                  min="0"
                  step="1"
                  suffix="m"
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="2" v-else>
                <v-text-field
                  solo
                  v-model="formData.myHeight.meters"
                  label="meters"
                  :rules="heightRules"
                  required
                  type="number"
                  min="0"
                  step="1"
                  suffix="m"
                  v-if="formData.heightUnits=='metric'"
                ></v-text-field>
                <v-text-field
                  solo
                  v-model="formData.myHeight.feet"
                  label="feet"
                  :rules="heightRules"
                  required
                  type="number"
                  min="0"
                  step="1"
                  suffix="ft"
                  v-else
                ></v-text-field>
              </v-col>
              <v-col cols="8" md="2" v-if="formData.heightUnits!='metric'">
                <!-- v-text-field
                  solo
                  v-model="formData.myHeight.centimeters"
                  label="centimeters"
                  :rules="heightRules"
                  required
                  type="number"
                  min="0"
                  max="99"
                  suffix="cm"
                  v-if="formData.heightUnits=='metric'"
                ></v-text-field -->
                <v-text-field
                  solo
                  v-model="formData.myHeight.inches"
                  label="inches"
                  :rules="heightRules"
                  required
                  type="number"
                  min="0"
                  max="11"
                  suffix="in"
                  v-if="formData.heightUnits!='metric'"
                ></v-text-field>
              </v-col>
              <v-col cols="4" md="4">
                <v-switch
                  v-model="switchHeightUnits"
                  inset
                  :label="formData.heightUnits"
                ></v-switch>
              </v-col>
            </v-row>
            <v-row justify="center">
              <v-col cols="12" md="4">
                3 - 6 months ago I weighed
              </v-col>
              <v-col cols="12" md="4" v-if="formData.weightUnits=='metric'">
                <v-text-field
                  solo
                  v-model="formData.myWeight.previous.kilograms"
                  label="kilograms"
                  :rules="weightRules"
                  required
                  type="number"
                  min="0"
                  suffix="kg"
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="2" v-else>
                <!-- v-text-field
                  solo
                  v-model="formData.myWeight.previous.kilograms"
                  label="kilograms"
                  :rules="weightRules"
                  required
                  type="number"
                  min="0"
                  suffix="kg"
                  v-if="formData.weightUnits=='metric'"
                ></v-text-field -->
                <v-text-field
                  solo
                  v-model="formData.myWeight.previous.stones"
                  label="stone"
                  :rules="weightRules"
                  required
                  type="number"
                  min="0"
                  suffix="st"
                ></v-text-field>
              </v-col>
              <v-col cols="8" md="2" v-if="formData.weightUnits!='metric'">
                <!-- v-text-field
                  solo
                  v-model="formData.myWeight.previous.grams"
                  label="grams"
                  :rules="weightRules"
                  required
                  type="number"
                  min="0"
                  max="999"
                  suffix="g"
                  v-if="formData.weightUnits=='metric'"
                ></v-text-field -->
                <v-text-field
                  solo
                  v-model="formData.myWeight.previous.pounds"
                  label="pounds"
                  :rules="weightRules"
                  required
                  type="number"
                  min="0"
                  max="13"
                  suffix="lb"
                ></v-text-field>
              </v-col>
              <v-col cols="4">
                <v-switch
                  v-model="switchWeightUnits"
                  inset
                  :label="formData.weightUnits"
                ></v-switch>
              </v-col>
            </v-row>
            <v-row justify="center">
              <v-col cols="12" md="4">
                Currently I weigh
              </v-col>
              <v-col cols="12" md="4" v-if="formData.weightUnits=='metric'">
                <v-text-field
                  solo
                  v-model="formData.myWeight.current.kilograms"
                  label="kilograms"
                  :rules="weightRules"
                  required
                  type="number"
                  min="0"
                  suffix="kg"
                  v-if="formData.weightUnits=='metric'"
                ></v-text-field>
              </v-col>
              <v-col cols="12" md="2" v-else>
                <!-- v-text-field
                  solo
                  v-model="formData.myWeight.current.kilograms"
                  label="kilograms"
                  :rules="weightRules"
                  required
                  type="number"
                  min="0"
                  suffix="kg"
                  v-if="formData.weightUnits=='metric'"
                ></v-text-field -->
                <v-text-field
                  solo
                  v-model="formData.myWeight.current.stones"
                  label="stone"
                  :rules="weightRules"
                  required
                  type="number"
                  min="0"
                  suffix="st"
                ></v-text-field>
              </v-col>
              <v-col cols="8" md="2" v-if="formData.weightUnits!='metric'">
                <!-- v-text-field
                  solo
                  v-model="formData.myWeight.current.grams"
                  label="grams"
                  :rules="weightRules"
                  required
                  type="number"
                  min="0"
                  max="999"
                  suffix="g"
                  v-if="formData.weightUnits=='metric'"
                ></v-text-field -->
                <v-text-field
                  solo
                  v-model="formData.myWeight.current.pounds"
                  label="pounds"
                  :rules="weightRules"
                  required
                  type="number"
                  min="0"
                  max="13"
                  suffix="lb"
                ></v-text-field>
              </v-col>
              <v-col cols="4">
                <v-switch
                  v-model="switchWeightUnits"
                  inset
                  :label="formData.weightUnits"
                ></v-switch>
              </v-col>
            </v-row>
            <v-row 
              justify="center" 
              v-if="showWLI"
            >
              <v-col cols="12" md="4">
                Was this weight loss intentional?
              </v-col>
              <v-col cols="12" md="4">
                <v-radio-group
                    v-model="formData.intentional"
                    row
                    :rules="showWLI ? radioRules : []"
                >  
                  <v-radio
                      label="Yes"
                      value="2"
                  ></v-radio>   
                  <v-radio
                      label="No"
                      value="0"
                  ></v-radio>
                </v-radio-group>
              </v-col>
              <v-col cols="4">
              </v-col>
            </v-row>
            <v-row justify="center">
              <v-col cols="12" md="4">
                I have had NO nutritional intake over the last 5 days, OR I am unlikely to have ANY nutritional intake for the next 5 days <v-icon justify="end" v-on:click="dialog=true">mdi-information-outline</v-icon><MenuIcon justify="end" v-on:click="dialog=true" />
              </v-col>
              <v-col cols="12" md="4">
                <v-radio-group
                    v-model="formData.noIntake"
                    row
                    required
                    :rules="radioRules"
                >  
                  <v-radio
                      label="Yes"
                      value="2"
                  ></v-radio>   
                  <v-radio
                      label="No"
                      value="0"
                  ></v-radio>
                </v-radio-group>
              </v-col>
              <v-col cols="auto" md="4">
              </v-col>
            </v-row>
          </v-form>
        </v-col>
      </v-row>
      
      <v-dialog
        v-model="dialog"
        width="500"
      >
        <v-card>
          <v-card-title class="text-h5 grey lighten-2">
            Additional information
          </v-card-title>

          <v-card-text>
            <v-row justify="center" align="center">
              <v-col cols="10">
                <p><br>This includes if you are a patient with a bowel obstruction, OR if you are unable to swallow, OR if you have severe uncontrolled vomiting (this is unlikely to occur outside hospital)</p>
              </v-col>
            </v-row>
          </v-card-text>

          <v-divider></v-divider>

          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn
              color="primary"
              text
              @click="dialog=false"
            >
              Close
            </v-btn>
          </v-card-actions>
        </v-card>
      </v-dialog>
      <v-row justify="space-between">
        <v-col cols="12" md="3">
          <v-btn block plain v-on:click="goBack"><v-img contain :src="srcBack" height="40" width="40" max-width="40"></v-img> Back</v-btn>
        </v-col>
        <v-col cols="12" md="3">
          <v-btn block plain v-on:click="submitForm">Next <v-img contain :src="src" height="40" width="40" max-width="40"></v-img></v-btn>
        </v-col>
      </v-row>

    </v-container>
  
</template>

<script>
import MenuIcon from 'vue-material-design-icons/InformationOutline.vue';

  export default {
    components: {
      MenuIcon
    },
    props: [ 'pageOneHeadings',],
    data: () => ({
      valid: true,
      src: require('./../assets/chev.png'),
      srcBack: require('./../assets/chevBack.png'),
      showWLI: false,
      dialog: false,
      switchHeightUnits : false,
      switchWeightUnits : false,
      formData : {
        heightUnits : "metric",
        weightUnits : "metric",
        intentional : false,
        noIntake : false,
        myHeight: {
          meters: null,
          centimeters: null,
          feet : null,
          inches : null
        },
        myWeight: {
          previous : {
            kilograms : null,
            grams : null,
            stones : null,
            pounds : null
          },
          current : {
            kilograms : null,
            grams : null,
            stones : null,
            pounds : null
          },
        },
        row: null
      },
      firstname: '',
      lastname: '',
      radioRules: [
        v => !!v || 'Please select an option'
      ],
      heightRules: [
        v => !!v || 'Height is required',
        v => v > -1 || 'Height cannot be negative',
      ],
      weightRules: [
        v => !!v || 'Weight is required',
        v => v > -1 || 'Weight cannot be negative',
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
      switchHeightUnits: {
        handler() {
          if(this.switchHeightUnits){
            this.formData.heightUnits = 'imperial'
          }else{
            this.formData.heightUnits = 'metric'
          }
        }
      },
      switchWeightUnits: {
        handler() {
          if(this.switchWeightUnits){
            this.formData.weightUnits = 'imperial'
          }else{
            this.formData.weightUnits = 'metric'
          }
        }
      },
      formData: {
        handler(){
          //this.$emit('formOne', this.formData)
          if(this.formData.myWeight.current.kilograms && this.formData.myWeight.previous.kilograms) {
            if( Math.abs(this.formData.myWeight.current.kilograms) < Math.abs(this.formData.myWeight.previous.kilograms) ) {
              this.showWLI = true
            }else{
              this.showWLI = false
            }
          }else if(this.formData.myWeight.current.stones && this.formData.myWeight.current.pounds && this.formData.myWeight.previous.stones && this.formData.myWeight.previous.pounds) {
            if( Math.abs(this.formData.myWeight.current.stones) + (Math.abs(this.formData.myWeight.current.pounds)/100) < Math.abs(this.formData.myWeight.previous.stones) + (Math.abs(this.formData.myWeight.previous.pounds)/100)) {
              this.showWLI = true
            }else{
              this.showWLI = false
            }
          }
        },
        deep: true
      }
    },
    methods: {
      submitForm () {
        // METERS AND CENTIMETERS TO FEET/INCHES
        if(this.formData.myHeight.centimeters && this.formData.myHeight.meters && this.formData.heightUnits == 'metric') {
          var feet = (this.formData.myHeight.centimeters*0.032808) + (this.formData.myHeight.meters*3.28)
          var tmp =  Math.abs("."+feet.toString().split(".")[1])
          var inches = tmp * 12
          this.formData.myHeight.feet = feet.toFixed(0)
          this.formData.myHeight.inches = inches.toFixed(2)
        }else if(this.formData.myHeight.inches && this.formData.myHeight.feet && this.formData.heightUnits == 'imperial') {
          var meters = (this.formData.myHeight.inches/39.37) + (this.formData.myHeight.feet*0.3048)
          var centimeters =  meters.toString().split(".")[1]
          this.formData.myHeight.meters = Math.abs(meters.toString().split(".")[0])
          this.formData.myHeight.centimeters = centimeters.substring(0, 2)
        }
        // KG G TO ST LB
        if(this.formData.myWeight.current.kilograms && this.formData.weightUnits == 'metric') {
          var stones = ( Math.abs(this.formData.myWeight.current.kilograms) ) / 6.35
          var pounds = parseInt((stones % 1).toFixed(2).substring(2));
          this.formData.myWeight.current.pounds = parseInt(pounds / 14)
          this.formData.myWeight.current.stones = parseInt(stones)
        }else if(this.formData.myWeight.current.pounds && this.formData.myWeight.current.stones && this.formData.weightUnits == 'imperial'){
          var kilograms = ( Math.abs(this.formData.myWeight.current.stones) + Math.abs(this.formData.myWeight.current.pounds / 100) ) * 6.35
          var grams = parseInt((kilograms % 1).toFixed(2).substring(2));
          this.formData.myWeight.current.kilograms = parseInt(kilograms).toFixed(2)
          this.formData.myWeight.current.grams = grams
        }
        if(this.formData.myWeight.previous.kilograms && this.formData.weightUnits == 'metric') {
          var stonesP = ( Math.abs(this.formData.myWeight.previous.kilograms) ) / 6.35
          var poundsP = parseInt((stonesP % 1).toFixed(2).substring(2));
          this.formData.myWeight.previous.pounds = parseInt(poundsP / 14)
          this.formData.myWeight.previous.stones = parseInt(stonesP)
        }else if(this.formData.myWeight.previous.pounds && this.formData.myWeight.previous.stones && this.formData.weightUnits == 'imperial'){
          var kilogramsP = ( Math.abs(this.formData.myWeight.previous.stones) + Math.abs(this.formData.myWeight.previous.pounds / 100) ) * 6.35
          var gramsP = parseInt((kilogramsP % 1).toFixed(2).substring(2));
          this.formData.myWeight.previous.kilograms = parseInt(kilogramsP).toFixed(2)
          this.formData.myWeight.previous.grams = gramsP
        }
        
        if(this.$refs.form.validate()) {
          this.$emit('formOne', this.formData)
        }
        
      },
      goBack() {
        this.$emit('goBack')
      },
      emitToParent () {
        this.$emit('formOne', this.formData)
      }
    }
  }
</script>