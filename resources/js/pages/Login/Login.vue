<script setup>
import { ref } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import { Card, InputText, Password, Checkbox, Button, Message } from 'primevue';



const username = ref('')
const password = ref('')
const error = ref('')
const success = ref('')

// Dummy data
const dummyUser = { username: 'admin', password: 'password' }

function login() {
  if (username.value === dummyUser.username && password.value === dummyUser.password) {
    success.value = 'Login successful!'
    error.value = ''
  } else {
    error.value = 'Invalid credentials'
    success.value = ''
  }
}
</script>

<template>
  <div class="flex justify-center items-center min-h-screen bg-gray-100">
    <Card class="w-96 shadow-2xl">
      <template #title>Login</template>
      <template #content>
        <div class="mb-4">
          <label class="block mb-1">Username</label>
          <InputText v-model="username" class="w-full" />
        </div>
        <div class="mb-4">
          <label class="block mb-1">Password</label>
          <Password v-model="password" toggleMask feedback="false" class="w-full" />
        </div>
        <Button label="Login" class="w-full" @click="login" />
        <div class="mt-4">
          <Message v-if="error" severity="error">{{ error }}</Message>
          <Message v-if="success" severity="success">{{ success }}</Message>
        </div>
      </template>
    </Card>
  </div>
</template>