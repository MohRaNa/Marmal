<script setup>
import { ref } from 'vue';
import { useForm, Link } from '@inertiajs/vue3';
import { Card, InputText, Password, Checkbox, Button, Message } from usePrimeVue;

const authError = ref('');

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const handleSubmit = () => {
  form.post(route('login'), {
    onError: (errors) => {
      if (errors.email || errors.password) {
        authError.value = 'Las credenciales proporcionadas no son válidas.';
      }
    },
  });
};
</script>

<template>
  <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img 
        class="mx-auto h-12 w-auto" 
        src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" 
        alt="Marmal Logo"
      >
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
        Inicia sesión en tu cuenta
      </h2>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <Card class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
        <template #content>
          <form class="space-y-6" @submit.prevent="handleSubmit">
            <Message v-if="authError" severity="error" :closable="false">
              {{ authError }}
            </Message>

            <div>
              <label for="email" class="block text-sm font-medium text-gray-700">
                Correo electrónico
              </label>
              <div class="mt-1">
                <InputText
                  id="email"
                  v-model="form.email"
                  type="email"
                  autocomplete="email"
                  required
                  class="w-full"
                  :class="{ 'p-invalid': form.errors.email }"
                />
                <small class="p-error">{{ form.errors.email }}</small>
              </div>
            </div>

            <div>
              <label for="password" class="block text-sm font-medium text-gray-700">
                Contraseña
              </label>
              <div class="mt-1">
                <Password
                  id="password"
                  v-model="form.password"
                  :feedback="false"
                  toggleMask
                  class="w-full"
                  :class="{ 'p-invalid': form.errors.password }"
                  inputClass="w-full"
                />
                <small class="p-error">{{ form.errors.password }}</small>
              </div>
            </div>

            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <Checkbox
                  id="remember"
                  v-model="form.remember"
                  binary
                  class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"
                />
                <label for="remember" class="ml-2 block text-sm text-gray-900">
                  Recordarme
                </label>
              </div>

              <div class="text-sm">
                <Link
                  :href="route('password.request')"
                  class="font-medium text-indigo-600 hover:text-indigo-500"
                >
                  ¿Olvidaste tu contraseña?
                </Link>
              </div>
            </div>

            <div>
              <Button
                type="submit"
                label="Iniciar sesión"
                class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                :loading="form.processing"
              />
            </div>
          </form>

          <div class="mt-6">
            <div class="relative">
              <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-gray-300" />
              </div>
              <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-gray-500">
                  ¿Nuevo en Marmal?
                </span>
              </div>
            </div>

            <div class="mt-6">
              <Link
                :href="route('register')"
                class="w-full flex justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
              >
                Crear una nueva cuenta
              </Link>
            </div>
          </div>
        </template>
      </Card>
    </div>
  </div>
</template>


