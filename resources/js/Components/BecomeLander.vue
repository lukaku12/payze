<template>
    <button @click="openModal"
            class="bg-purple-700 flex justify-between items-center px-4 h-3/4 mt-[10px] rounded-xl font-bold hover: text-white cursor-pointer">
        გახდი გამსესხებელი
    </button>

    <div v-if="showModal" class="absolute top-1/2 left-1/2 w-[50%] h-[70%] -translate-x-1/2 -translate-y-1/2 flex flex-col items-center border border-2 bg-emerald-500 rounded-xl">
        <div class="mt-4  w-3/4">
            <InputLabel for="TODO" value="TODO" />
            <TextInput id="TODO" type="text" class="mt-1 block w-full" v-model="card.name" required autocomplete="current-password" />
            <InputError class="mt-2" :message="card.name" />
        </div>
    </div>
</template>


<script>
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
export default {
    components: {TextInput, InputLabel, InputError},

    data() {
        return {
            showModal: false,
            card: {
                name: '',
                number: '',
                cvc: '',
                expiry: '',
            },
        }
    },
    methods: {
        openModal() {
            this.showModal = true;
        }
    }
}
</script>
