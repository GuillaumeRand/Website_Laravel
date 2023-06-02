<template>
  <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
    <div class="flex-1 flex justify-between sm:hidden">
      <a href="#" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Previous </a>
      <a href="#" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Next </a>
    </div>
    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
      <div>
        <p class="text-sm text-gray-700">
          Affichage
          {{ ' ' }}
          <span class="font-medium">{{ currentPage }}</span>
          {{ ' ' }}
          de
          {{ ' ' }}
          <span class="font-medium">{{ totalPages }}</span>
          {{ ' ' }}
          sur
          {{ ' ' }}
          <span class="font-medium">{{ totalElements }}</span>
          {{ ' ' }}
          résultats
        </p>
      </div>
      <div class="flex-1 flex justify-between sm:justify-end">
        <button v-on:click="prevPage" class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Précédent </button>
        <button v-on:click="nextPage" class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"> Suivant </button>
      </div>

    </div>
  </div>
</template>

<script setup lang="ts">

import {Inertia} from "@inertiajs/inertia";

const props = defineProps<{
  currentPage: Number,
  totalElementPerPage: Number,
  totalPages: Number,
  totalElements: Number,
}>()

function nextPage() {
  Inertia.visit(route(route().current(), {page: props.currentPage + 1}));
}

function prevPage() {
  Inertia.visit(route(route().current(), {page: props.currentPage - 1}));
}

</script>
