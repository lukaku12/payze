<template>
    <button @click="openModal"
            class="bg-purple-700 flex justify-between items-center px-4 h-3/4 mt-[10px] rounded-xl font-bold hover: text-white cursor-pointer">
        გახდი გამსესხებელი
    </button>

    <div @click="closeModal" v-if="showModal"
         class="fixed w-screen h-screen bg-[rgba(0,0,0,0.6)] top-0 left-0 !ml-0 z-40">
    </div>
    <div
        v-if="showModal"
        class="fixed max-w-[700px] top-1/2 left-1/2 w-[80%] py-16 -translate-x-1/2 z-50 -translate-y-1/2 flex flex-col items-center border border-2 border-purple-600 bg-white rounded-xl">
        <div class="mt-4 w-3/4">
            <InputLabel for="max_amount_to_land" value="მაქსიმალური გასასხების ოდენობა"/>
            <TextInput id="max_amount_to_land" type="text" class="mt-1 block w-full border border-black" v-model="max_amount_to_land" required placeholder="შეიყვანეთ მაქსიმალური თანხა რაც შეგიძლიათ რომ გაასესხოთ"
                       autocomplete="card_name"/>
            <InputError class="mt-2" :message="max_amount_to_land"/>
        </div>
        <div class="mt-4 w-3/4">
            <InputLabel for="card_name" value="ბარათის სახელი"/>
            <TextInput id="card_name" type="text" class="mt-1 block w-full border border-black" v-model="card_name" required placeholder="Soul Goodman"
                       autocomplete="card_name"/>
            <InputError class="mt-2" :message="card_name"/>
        </div>
        <div class="mt-7 w-3/4">
            <select class="w-full rounded">
                <option selected disabled>აირჩიე ვალუტა</option>
                <option value="1">USD</option>
                <option value="2">GEL</option>
            </select>
        </div>
        <div class="mt- w-3/4 relative h-[40px]">
            <button
                class="bg-purple-700 absolute right-0 flex justify-between items-center px-4 py-2.5 mt-[10px] rounded-xl font-bold hover: text-white cursor-pointer">
                <a href="#">
                    ბარათის დამატება
                </a>
            </button>
        </div>
    </div>
</template>


<script>
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import Checkbox from "@/Components/Checkbox.vue";

export default {
    components: {Checkbox, TextInput, InputLabel, InputError,},

    data() {
        return {
            showModal: false,
            card_name: '',
            max_amount_to_land: '',
        }
    },
    methods: {
        openModal() {
            this.showModal = true;
        },
        closeModal() {
            this.showModal = false;
        }
    }
}
</script>
