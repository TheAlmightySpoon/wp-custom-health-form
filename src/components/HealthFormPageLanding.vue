<template>
    <v-container fill-height>
      <v-row justify="center">
          <v-col cols="10">
              <h1 class="text-center">Eating well with cancer:</h1>
              <h1 class="text-center blue-text">receive personalised nutritional advice</h1>
              
          </v-col>
      </v-row>
      <v-row justify="center">
          <v-col cols="auto">
              <v-btn block plain v-on:click="emitToParent">CLICK HERE TO BEGIN <v-img contain :src="src" height="40" width="40" max-width="40"></v-img>
              </v-btn>
          </v-col>
      </v-row>
    </v-container>
</template>

<script>
  export default {
    data: () => ({
      src: require('./../assets/chev.png')
    }),
    methods: {
      emitToParent () {
        this.$emit('nextPage', '1')
      }
    }
  }
</script>