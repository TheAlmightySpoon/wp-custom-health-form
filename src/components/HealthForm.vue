<template>
  <v-form v-model="valid">
    <v-container>
      <v-row>
        <h2>{{subHeadingOne}}</h2>
        <v-col
          cols="8"
          md="4"
        >
          <v-text-field
            v-model="firstname"
            :rules="nameRules"
            :counter="10"
            label="First name"
            required
          ></v-text-field>
        </v-col>

        <v-col
          cols="8"
          md="4"
        >
          <v-text-field
            v-model="lastname"
            :rules="nameRules"
            :counter="10"
            label="Last name"
            required
          ></v-text-field>
        </v-col>
        <h2>{{subHeadingTwo}}</h2>
        <v-col
          cols="8"
          md="4"
        >
          <v-text-field
            v-model="email"
            :rules="emailRules"
            label="E-mail"
            required
          ></v-text-field>
        </v-col>
      </v-row>
    </v-container>
  </v-form>
</template>

<script>
  export default {
    props: ['subHeadingOne', 'subHeadingTwo'],
    data: () => ({
      valid: false,
      firstname: '',
      lastname: '',
      nameRules: [
        v => !!v || 'Name is required',
        v => v.length <= 10 || 'Name must be less than 10 characters',
      ],
      email: '',
      emailRules: [
        v => !!v || 'E-mail is required',
        v => /.+@.+/.test(v) || 'E-mail must be valid',
      ],
    }),
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