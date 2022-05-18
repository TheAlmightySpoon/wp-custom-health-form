<template>
  <v-form v-model="valid">
    <v-container fill-height>
      <v-row justify="center">
        <v-col cols="10">
          <h1 class="text-center">{{pageTwoHeadings.headingOne}}</h1>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="10">
          <h2 class="text-center">{{pageTwoHeadings.subHeadingOne}}</h2>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-radio-group
            v-model="formData.row1"
            row
        >
            <v-radio
              label="Unchanged"
              value="0z"
            ></v-radio>   
            <v-radio
              label="More than usual"
              value="0"
            ></v-radio>
            <v-radio
              label="Less than usual"
              value="1"
            ></v-radio>
        </v-radio-group>
      </v-row>
      <v-row justify="center">
        <v-col cols="10">
          <h2 class="text-center">{{pageTwoHeadings.subHeadingTwo}}</h2>
        </v-col>
      </v-row>
       
      <v-row justify="center">
        <v-radio-group
            v-model="formData.row2"
            row
        >  
          <v-radio
              label="Normal food but less than usual"
              value="1"
          ></v-radio>   
          <v-radio
              label="Little solid food"
              value="2"
          ></v-radio>
          <v-radio
              label="Only liquids"
              value="3"
          ></v-radio>
          <v-radio
              label="Only nutritional suppliments" 
              value="3a"
          ></v-radio>   
          <v-radio
              label="Very little of anything"
              value="4"
          ></v-radio>
          <v-radio
              label="Only a tube feed"
              value="0"
          ></v-radio>
        </v-radio-group>
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
  export default {
    props: [ 'pageTwoHeadings',],
    data: () => ({
      valid : false,
      formData : {
        row1 : false,
        row2 : false
      }
    }),
    watch: {
      formData: {
        handler(){
          this.$emit('formTwo', this.formData)
        },
        deep: true
      }
    },
    methods: {
      emitToParent () {
        this.$emit('formTwo', this.formData)
      }
    }
  }
</script>