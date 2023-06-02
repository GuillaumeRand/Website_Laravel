<script setup lang="ts">

const filters = [
  {
    id: 'category',
    name: 'Category',
    options: [
      { value: 'new-arrivals', label: 'All New Arrivals', checked: false },
      { value: 'tees', label: 'Tees', checked: false },
      { value: 'objects', label: 'Objects', checked: true },
      { value: 'sweatshirts', label: 'Sweatshirts', checked: false },
      { value: 'pants-shorts', label: 'Pants & Shorts', checked: false },
    ],
  },
  {
    id: 'color',
    name: 'Color',
    options: [
      { value: 'white', label: 'White', checked: false },
      { value: 'beige', label: 'Beige', checked: false },
      { value: 'blue', label: 'Blue', checked: false },
      { value: 'brown', label: 'Brown', checked: false },
      { value: 'green', label: 'Green', checked: false },
      { value: 'purple', label: 'Purple', checked: false },
    ],
  },
  {
    id: 'sizes',
    name: 'Sizes',
    options: [
      { value: 'xs', label: 'XS', checked: false },
      { value: 's', label: 'S', checked: false },
      { value: 'm', label: 'M', checked: false },
      { value: 'l', label: 'L', checked: false },
      { value: 'xl', label: 'XL', checked: false },
      { value: '2xl', label: '2XL', checked: false },
    ],
  },
]

const activeFilters = [{ value: 'objects', label: 'Objects' }]

const sortOptions = [
  { name: 'Most Popular', href: '#', current: true },
  { name: 'Best Rating', href: '#', current: false },
  { name: 'Newest', href: '#', current: false },
]

const products = [
  {
    id: 1,
    name: 'Arcade Fire Presente',
    description:
      '15 sept. 2022',
    href: '#',
    price: 'A partir de 57.80 €',
    status: 'Preparing to ship',
    step: 1,
    date: 'March 24, 2021',
    datetime: '2021-03-24',
    address: ['Accor Arena - Paris', 'Concert - Pop Rock Folk', 'Arcade Fire'],
    email: 'f•••@example.com',
    phone: '1•••••••••40',
    imageSrc: 'https://static.ticketmaster.fr/static/images/vignettes/n_arcade-fire-presente.gif',
    imageAlt: 'Insulated bottle with white base and black snap lid.',
  },
  {
    id: 1,
    name: 'Arcade Fire Presente',
    description:
      '15 sept. 2022',
    href: '#',
    price: 'A partir de 57.80 €',
    status: 'Preparing to ship',
    step: 1,
    date: 'March 24, 2021',
    datetime: '2021-03-24',
    address: ['Accor Arena - Paris', 'Concert - Pop Rock Folk', 'Arcade Fire'],
    email: 'f•••@example.com',
    phone: '1•••••••••40',
    imageSrc: 'https://static.ticketmaster.fr/static/images/vignettes/n_arcade-fire-presente.gif',
    imageAlt: 'Insulated bottle with white base and black snap lid.',
  },
  {
    id: 1,
    name: 'Arcade Fire Presente',
    description:
      '15 sept. 2022',
    href: '#',
    price: 'A partir de 57.80 €',
    status: 'Preparing to ship',
    step: 1,
    date: 'March 24, 2021',
    datetime: '2021-03-24',
    address: ['Accor Arena - Paris', 'Concert - Pop Rock Folk', 'Arcade Fire'],
    email: 'f•••@example.com',
    phone: '1•••••••••40',
    imageSrc: 'https://static.ticketmaster.fr/static/images/vignettes/n_arcade-fire-presente.gif',
    imageAlt: 'Insulated bottle with white base and black snap lid.',
  },

]


defineProps<{
}>()
</script>

<template layout="default">

  <main>
    <div class="bg-white">
      <div class="max-w-7xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Évenements à <span class="text-indigo-700">Rennes</span></h1>
        <p class="mt-4 max-w-xl text-sm text-gray-700"><span class="font-medium">1245 résultats</span> ont été trouvés à proximité de Rennes.</p>
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
                  <span v-for="activeFilter in activeFilters" :key="activeFilter.value" class="m-1 inline-flex rounded-full border border-gray-200 items-center py-1.5 pl-3 pr-2 text-sm font-medium bg-white text-gray-900">
                    <span>{{ activeFilter.label }}</span>
                    <button type="button" class="flex-shrink-0 ml-1 h-4 w-4 p-1 rounded-full inline-flex text-gray-400 hover:bg-gray-200 hover:text-gray-500">
                      <span class="sr-only">Remove filter for {{ activeFilter.label }}</span>
                      <svg class="h-2 w-2" stroke="currentColor" fill="none" viewBox="0 0 8 8">
                        <path stroke-linecap="round" stroke-width="1.5" d="M1 1l6 6m0-6L1 7" />
                      </svg>
                    </button>
                  </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section aria-labelledby="products-heading" class="max-w-full mx-auto pt-12 pb-16 px-4 sm:pt-16 sm:pb-24 sm:px-6 lg:px-8">
      <h2 id="products-heading" class="sr-only">Products</h2>

      <div class="grid grid-cols-1 gap-y-10 xl:grid-cols-2 gap-x-6 xl:gap-x-8">
        <div v-for="product in products" :key="product.id" class="bg-white border-t border-b border-gray-200 shadow-sm sm:border sm:rounded-lg">
          <div class="py-6 px-4 sm:px-6 lg:grid lg:grid-cols-12 lg:gap-x-8 lg:p-8">
            <div class="sm:flex lg:col-span-7">
              <div class="flex-shrink-0 w-full aspect-w-1 aspect-h-1 rounded-lg overflow-hidden sm:aspect-none sm:w-40 sm:h-40">
                <img :src="product.imageSrc" :alt="product.imageAlt" class="w-full h-full object-center object-cover sm:w-full sm:h-full" />
              </div>

              <div class="mt-6 sm:mt-0 sm:ml-6">
                <h3 class="text-base font-medium text-gray-900">
                  <a :href="product.href">{{ product.name }}</a>
                </h3>
                <p class="mt-2 text-sm font-medium text-gray-900">{{ product.price }}</p>
                <p class="mt-3 text-sm text-gray-500">
                  {{ product.description }}
                </p>
              </div>
            </div>

            <div class="mt-6 lg:mt-0 lg:col-span-5">
              <div class="text-sm">
                <dd class="mt-3 text-gray-500">
                  <span class="block font-medium text-blue-700">{{ product.address[0] }}</span>
                  <span class="block">{{ product.address[1] }}</span>
                  <span class="block">Artiste: <span class="text-blue-700">{{ product.address[2] }}</span></span>
                </dd>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

</template>
