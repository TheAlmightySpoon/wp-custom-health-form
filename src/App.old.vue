<template>
  <v-app >
    <v-main class="maintainer" :style="{'background-image': `url(${require('./assets/background.png')})`}">
      <v-container fill-height >
        <v-row justify="center">
          <v-col cols="auto">
            <v-card
              flat tile
            >
              <component v-bind:is="currentComponent" v-on:getStarted="getStarted"></component>
              <HealthFormPageLanding key="1"  v-show="userPosition==0"/>
              <HealthFormPageOne key="2" :pageOneHeadings="pageOne" :formData="formDataOne" v-on:formOne="formOneUpdate" v-show="userPosition==1"/>
              <HealthFormPageThree key="3" :pageThreeHeadings="pageThree" :feels="feels" v-on:formThree="formThreeUpdate" v-show="userPosition==2"/>
              <HealthFormPageResult key="4" :pageResultHeadings="pageResult" :score="score" :BMI="BMI" :UWL="UWL" :MUST="MUST" :intentional="formData.one.intentional" :links="fellsLinksActive" v-on:formResult="formResultUpdate" v-show="userPosition==3"/>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import HealthFormPageLanding from './components/HealthFormPageLanding.vue';
import HealthFormPageOne from './components/HealthFormPageOne.vue';
//import HealthFormPageTwo from './components/HealthFormPageTwo.vue';
import HealthFormPageThree from './components/HealthFormPageThree.vue';
//import HealthFormPageFour from './components/HealthFormPageFour.vue';
import HealthFormPageResult from './components/HealthFormPageResult.vue';
//import HealthFormPageAdvice from './components/HealthFormPageAdvice.vue';
import 'vue-material-design-icons/styles.css';

export default {
  name: 'App',

  components: {
    HealthFormPageLanding,
    HealthFormPageOne,
    //HealthFormPageTwo,
    HealthFormPageThree,
    //HealthFormPageFour,
    HealthFormPageResult,
    //HealthFormPageAdvice
  },

  data: () => ({
    //
    currentComponent: HealthFormPageLanding,
    userPosition: 0,
    formData: {
      one: [],
      two: [],
      three: [],
      four: 0
    },
    formDataOne : {
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
    BMI : 0,
    UWL: 0,
    ADE: 0,
    MUST: 'low',
    score : {
      BMI : 0,
      weight : 0,
      activity : 0,
      food : 0,
      symptom : 0,
      total : 0
    },
    pageOne : {
      headingOne : "First let’s think about your height and weight",
      subHeadingOne : "Weight history",
      subHeadingTwo : "During the past 2 weeks my weight has:",
    },
    pageTwo : {
      headingOne : "Now, let’s look at how you are doing with your eating",
      subHeadingOne : "Compared to my normal intake I would rate my intake during the last month as:",
      subHeadingTwo : "I am now taking",
    },
    pageThree : {
      headingOne : "Next, let’s consider how you’ve been feeling",
      subHeadingOne : "I have the following problems that have kept me from eating during the past 2 weeks (select all that apply)",
    },
    pageFour : {
      headingOne : "Finally, let’s look at your activity levels",
      subHeadingOne : "Over the last month I would generally rate my activity as:",
    },
    pageResult : {
      headingOne : "These are your survey results",
      headingTwo : "Total score",
      subHeadingOne : "Break down of total score",
      printButton : "Print answers",
      emailButton : "Email results",
    },
    pageAdvice : {
      headingOne : "Personalised dietary advice",
      pageText : "Also how many sentences are there and which ones will show on which scores?<br><br> What is ‘PGSGA’ score in the Word doc and how does it work?",
      pageTextTwo : "A specific sentence would appear here depending on the patients today score e.g. for a score of 4 or more it would recommend they talk to their CNS"
    },
    feels : [
      'Poor appetite', 
      'Vomiting', 
      'Nausea', 
      'Diarrhoea', 
      'Constipation', 
      'Dry mouth',  
      'Sore mouth', 
      'Feeling too tired to cook', 
      'Changes in taste', 
      'Increased flatulence (wind)', 
      'Feeling full quickly', 
      'Indigestion & heartburn'
    ],
    feelsLinksAll : [
      ['https://extranet.hampshirehospitals.nhs.uk/download_file/view/4036/589', 'https://cdn.macmillan.org.uk/dfsmedia/1a6f23537f7f4519bb0cf14c45b2a629/3833-source/mac13613-e04-eating-problems-lowres-20200929-lk?_ga=2.24520889.2080067083.1637330359-355950048.1617006683'],
      ['https://extranet.hampshirehospitals.nhs.uk/download_file/view/10170/589'],
      ['https://extranet.hampshirehospitals.nhs.uk/download_file/view/10170/589', 'https://cdn.macmillan.org.uk/dfsmedia/1a6f23537f7f4519bb0cf14c45b2a629/3833-source/mac13613-e04-eating-problems-lowres-20200929-lk?_ga=2.24520889.2080067083.1637330359-355950048.1617006683'],
      ['https://cdn.macmillan.org.uk/dfsmedia/1a6f23537f7f4519bb0cf14c45b2a629/3833-source/mac13613-e04-eating-problems-lowres-20200929-lk?_ga=2.24520889.2080067083.1637330359-355950048.1617006683'],
      ['https://www.royalmarsden.nhs.uk/your-care/living-and-beyond-cancer/eating-well/problems-may-affect-your-eating/how-manage', 'https://cdn.macmillan.org.uk/dfsmedia/1a6f23537f7f4519bb0cf14c45b2a629/3833-source/mac13613-e04-eating-problems-lowres-20200929-lk?_ga=2.24520889.2080067083.1637330359-355950048.1617006683'],
      ['https://cdn.macmillan.org.uk/dfsmedia/1a6f23537f7f4519bb0cf14c45b2a629/3833-source/mac13613-e04-eating-problems-lowres-20200929-lk?_ga=2.24520889.2080067083.1637330359-355950048.1617006683'],
      ['https://cdn.macmillan.org.uk/dfsmedia/1a6f23537f7f4519bb0cf14c45b2a629/3833-source/mac13613-e04-eating-problems-lowres-20200929-lk?_ga=2.24520889.2080067083.1637330359-355950048.1617006683'],
      ['https://cdn.macmillan.org.uk/dfsmedia/1a6f23537f7f4519bb0cf14c45b2a629/3833-source/mac13613-e04-eating-problems-lowres-20200929-lk?_ga=2.24520889.2080067083.1637330359-355950048.1617006683'],
      ['https://extranet.hampshirehospitals.nhs.uk/download_file/view/1646/589', 'https://cdn.macmillan.org.uk/dfsmedia/1a6f23537f7f4519bb0cf14c45b2a629/3833-source/mac13613-e04-eating-problems-lowres-20200929-lk?_ga=2.24520889.2080067083.1637330359-355950048.1617006683'],
      [],
      ['https://extranet.hampshirehospitals.nhs.uk/download_file/view/4036/589', 'https://cdn.macmillan.org.uk/dfsmedia/1a6f23537f7f4519bb0cf14c45b2a629/3833-source/mac13613-e04-eating-problems-lowres-20200929-lk?_ga=2.24520889.2080067083.1637330359-355950048.1617006683'],
      []
    ],
    fellsLinksActive : [

    ]
  }),
  methods: {
    getStarted: function(value) {
      this.userPosition = value
    },
    formOneUpdate(value) {
      this.formData.one = value
      // calc BMI w/(hxh)
      var BMI = (Math.abs(value.myWeight.current.kilograms) + Math.abs(value.myWeight.current.grams/100))/ ( (Math.abs(value.myHeight.meters) + Math.abs(value.myHeight.centimeters/100)) * (Math.abs(value.myHeight.meters) + Math.abs(value.myHeight.centimeters/100)) )
      var BMIscore = 0
      if(BMI <= 20 && BMI >=18.5) {
        BMIscore = 1
      }else if(BMI < 18.5) {
        BMIscore = 2
      }
      this.BMI = BMI
      this.score.BMI = BMIscore
      // calc unplanned weight loss
      var UWL = 0
      if(value.intentional==0 && (Math.abs(value.myWeight.current.kilograms) + Math.abs(value.myWeight.current.grams/100)) < (Math.abs(value.myWeight.previous.kilograms) + Math.abs(value.myWeight.previous.grams/100))) {
        var dif = (Math.abs(value.myWeight.previous.kilograms) + Math.abs(value.myWeight.previous.grams/100)) - (Math.abs(value.myWeight.current.kilograms) + Math.abs(value.myWeight.current.grams/100))
        UWL = (dif / (Math.abs(value.myWeight.previous.kilograms) + Math.abs(value.myWeight.previous.grams/100)) * 100).toFixed(2)
      }
      this.UWL = UWL
      // acute disease effect
      this.ADE = value.noIntake
      var totalScore = Math.abs(BMIscore) + Math.abs(value.noIntake) + UWL
      if(totalScore == 1) {
        this.MUST = 'medium'
      }else if(totalScore > 1) {
        this.MUST = 'high'
      }
      this.userPosition = 2
    },
    formTwoUpdate(value) {
      this.formData.two = value
    },
    formThreeUpdate(value) {
      this.formData.three = value
      Object.values(value).forEach(val=>{
        Object.values(this.feelsLinksAll[val]).forEach(link=>{
          // prevent duplication
          if(this.fellsLinksActive.indexOf(link)==-1){
            this.fellsLinksActive.push(link)
          }
        })
      })
      this.userPosition = 3
    },
    formFourUpdate(value) {
      this.formData.four = value
    },
    formResultUpdate() {
      this.userPosition = 0
      this.formData = {
        one: [],
        two: [],
        three: [],
        four: 0
      }
    },
    updateScore() {
      if(this.formData.one.row!=null) {
        this.score.weight = parseInt(this.formData.one.row)
      }
      this.score.food = 0
      if(this.formData.two.row1) {
        this.score.food += parseInt(this.formData.two.row1)
      }
      if(this.formData.two.row2) {
        this.score.food += parseInt(this.formData.two.row2)
      }
      this.score.symptom = 0
      Object.values(this.formData.three).forEach(val=>{
        if(val) {
          this.score.symptom += parseInt(val)
        }
      })
      this.score.activity = parseInt(this.formData.four)
      this.score.total = parseInt(this.score.weight) + parseInt(this.score.activity) + parseInt(this.score.food) + parseInt(this.score.symptom)
    }
  },
  watch: {
      formData: {
        handler(){
          this.updateScore()
        },
        deep: true
      },
      userPosition: {
        handler(value) {
          console.log(value)
        }
      }
    },
};
</script>
<style>
  h1 {
    color:#7f5881;
  }
  h1.blue-text {
    color:#0d68a4;
  }
  .background-grey {
    background-color: #f5f7f7;
  }
  .background-purple, 
  .theme--light.v-btn.v-btn--has-bg.background-purple,
  .theme--dark.v-btn.v-btn--has-bg.background-purple {
    background-color: #7f5881;
  }
  .backgroud-blue, .v-btn-toggle div>[type=button].btn-blue {
    background: none;
    background-color: #9aab66;
  }
  .theme--light.v-btn.v-btn--has-bg.btn-blue,
  .theme--dark.v-btn.v-btn--has-bg.btn-blue {
    background-color:#0d68a4;
  }
  .theme--light.v-btn.v-btn--has-bg.btn-orange,
  .theme--dark.v-btn.v-btn--has-bg.btn-orange {
    background: none;
    background-color:#E67E19;
  }
  .padded {
    padding-top:14px;
    padding-bottom:14px;
  }
  .v-data-table > .v-data-table__wrapper > table {
    border-spacing: 0.5rem;
  }
  .gradient-bg {
    background: rgb(154,171,102);
    background: linear-gradient(90deg, rgba(154,171,102,1) 0%, rgba(13,104,164,1) 50%, rgba(127,88,129,1) 100%);
  }
  .maintainer {
    background-size: cover;
  }
  /*
  the green is #9aab66 blue is #0d68a4 purple is #7f5881
  */
  .v-btn--fab.v-size--default.v-btn--absolute.v-btn--top.long {
    width:auto;
    height: 36px;
    top:16px;
    border-radius: 0;
    margin-right:-16px;
    min-width: 160px;
  }
  .v-btn--fab.v-size--default.v-btn--absolute.v-btn--top.print-icon.background-purple {
    top:4px;
    margin-right:-12px;
  }
  .v-btn--fab.v-size--default.v-btn--absolute.v-btn--top.email-icon.btn-blue {
    top:64px;
    margin-right:-12px;
  }
  .v-btn--fab.v-size--default.v-btn--absolute.v-btn--top.email {
    top:68px;
  }
  .v-btn--fab.v-size--default.v-btn--absolute.v-btn--top.long .v-btn__content {
    padding: 0 16px;
  }
  /* FIX 
  .mdi-radiobox-blank,
  .mdi-radiobox-marked,*/
  .v-radio .v-input--selection-controls__input {
    border: 1px solid #000;
    border-radius: 50%;
  }
  .mdi-radiobox-marked {
    background: #0d68a4;
    border-radius: 50%;
    border: 2px solid #fff;
  }
  .mdi-exclamation::before {
    content: "\!";
  }
  .mdi:before, .mdi-set {
    display: inline-block;
    font: normal normal normal 24px/1 "Material Design Icons";
    font-size: inherit;
    text-rendering: auto;
    line-height: inherit;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
  }
</style>