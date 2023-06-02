<script setup lang="ts">

import {onMounted, ref} from "vue";

import axios from "axios";

import moment from "moment";
import "moment/locale/fr";

import {Inertia} from "@inertiajs/inertia";
import Pagination from "@/views/components/pagination.vue";

const activeFilters = [
  { value: 'type', label: 'Évenements' },
  { value: 'city', label: props.city ?? 'France' },
  { value: 'page', label: `Page ${route().params.page ?? 1}` },
]

const props = defineProps<{
  city: String
}>()

const events = ref([]);

onMounted(() => {
  axios
    .get(route('enjoy'), {
      params: { search: props.city, page: route().params.page ?? 1 },
    })
    .then(response => (events.value = response.data))
    .catch(function () {
      Inertia.visit(route('event.index'));
    });
})
</script>

<template layout="default">

  <main>
    <div class="bg-white">
      <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
      </div>
    </div>

    <!-- Filters -->
    <section aria-labelledby="filter-heading">
      <!-- Active filters -->
      <div class="bg-gray-100">
        <div class="max-w-7xl mx-auto py-3 px-4 sm:flex sm:items-center sm:px-6 lg:px-8">
          <h3 class="text-xs font-semibold uppercase tracking-wide text-gray-500">
            Filtres
          </h3>

          <div aria-hidden="true" class="hidden w-px h-5 bg-gray-300 sm:block sm:ml-4" />

          <div class="mt-2 sm:mt-0 sm:ml-4">
            <div class="-m-1 flex flex-wrap items-center">
                <span v-for="activeFilter in activeFilters" :key="activeFilter.value" class="m-1 inline-flex rounded-full border border-gray-200 items-center py-1.5 pl-3 pr-3 text-sm font-medium bg-white text-gray-900">
                  <span>{{ activeFilter.label }}</span>
                </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section aria-labelledby="products-heading" class="max-w-full mx-auto pt-12 pb-16 px-4 sm:pt-16 sm:pb-24 sm:px-6 lg:px-8">
      <h2 id="products-heading" class="sr-only">Évenements</h2>

      <div v-if="events.length === 0" class="content-between text-center">
        <svg class="inline w-24 h-24 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
          <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
        </svg>
      </div>

      <div v-else class="grid grid-cols-1 gap-y-10 xl:grid-cols-2 gap-x-6 xl:gap-x-8">
        <div v-for="event in events.events" :key="event.id" class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
          <div class="py-6 px-4 sm:px-6 sm:grid sm:grid-cols-12 sm:gap-x-8 sm:p-8">
            <div class="sm:flex sm:col-span-7">
              <div class="flex-shrink-0 w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden sm:aspect-none sm:w-40 sm:h-40">
                <img :src="event.images[0].url" :alt="event.name" class="w-full h-full object-center object-cover sm:w-full sm:h-full" />
              </div>

              <div class="mt-6 sm:mt-0 sm:ml-6">
                <h3 class="text-base font-medium text-gray-900">
                  <a :href="event.url">{{ event.name }}</a>
                </h3>
                <p class="mt-2 text-sm font-medium text-gray-900">A partir de {{ event.priceRanges[0].min.toFixed(2) }}€</p>
                <p class="inline-flex items-center mt-3 px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800" v-if="event.dates.start">
                  Le {{ moment(event.dates.start.dateTime).format('DD/MM/YYYY à HH:MM') }}
                </p>
              </div>
            </div>

            <div class="mt-6 sm:mt-0 sm:col-span-5">
              <div class="text-sm">
                <dd class="mt-3 text-gray-500">
                  <span class="block font-medium text-blue-700">{{ event._embedded.venues[0].name }}</span>
                  <span class="block">{{ event._embedded.venues[0].address.line1 }}</span>
                  <span class="block">{{ event._embedded.venues[0].postalCode }} {{ event._embedded.venues[0].city.name }}</span>
                  <span class="block" v-if="event._embedded.attractions">Artiste: <a href="" class="text-blue-700">{{ event._embedded.attractions[0].name }}</a></span>
                </dd>
              </div>
            </div>
          </div>

          <div
            class="border-t border-gray-200 bg-gray-50 grid grid-cols-1 divide-y divide-gray-200  sm:divide-y-0 sm:divide-x"
            :class="event._embedded.attractions ? 'sm:grid-cols-2' : 'sm:grid-cols-1'"
          >

            <a :href="event.url" target="_blank" class="px-6 py-5 text-sm font-medium text-center">
              <span class="text-xl text-gray-600">
                Voir sur
                <img src="/images/ticketmaster-logo.png" class="inline-block -mt-1 w-28" />
              </span>
            </a>

            <a v-if="event._embedded.attractions" :href="event._embedded.attractions[0].url" target="_blank" class="px-6 py-5 text-sm font-medium text-center">
              <span class="text-xl text-gray-600">
                Informations sur <span class="font-bold">{{ $filters.truncate(event._embedded.attractions[0].name, 10) }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block -mt-1 ml-2 text-blue-500 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
              </span>
            </a>

          </div>
        </div>
      </div>

      <pagination
        v-if="events.pagination"
        :current-page="events.pagination.number"
        :total-element-per-page="events.pagination.size"
        :total-elements="events.pagination.totalElements"
        :total-pages="events.pagination.totalPages"
      />
    </section>
  </main>

</template>
