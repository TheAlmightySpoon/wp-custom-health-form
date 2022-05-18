<template>
    <v-container fill-height>
      <v-row justify="center">
        <v-col cols="10">
          <h1 class="text-center">{{pageAdviceHeadings.headingOne}}</h1>
        </v-col>
      </v-row>
      <v-row justify="center">
        <v-col cols="10">
          <p v-html="pageAdviceHeadings.pageText"></p>
        </v-col>
      </v-row>
      <v-row justify="center">
          <p>{{pageAdviceHeadings.pageTextTwo}}</p>
      </v-row> 
    </v-container>
</template>

<script>
  export default {
    props: [ 'pageAdviceHeadings',],
    data: () => ({
    }),
  }
</script>