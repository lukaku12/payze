<template>
    <div class="border border-2 border-gray-300 rounded px-20 py-24">
        <div class="flex flex-col md:flex-row gap-x-16">
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <div class="flex flex-col w-full mt-4">
                    <div class="mt-4 w-full flex flex-col items-center gap-y-10">
                        <div class="w-full flex flex-col justify-center items-center">
                            <input class="w-[70px] h-[40px] border-none focus:ring-0" v-model="moneyRange"
                                   @change="checkForValidInput" type="number" min="0" max="500">
                            <input class="w-full" v-model="moneyRange" @change="checkForValidInput" type="range" min="0"
                                   max="500">
                        </div>
                        <select class="w-full rounded focus:ring-0 mt-3">
                            <option selected disabled>აირჩიე ვალუტა</option>
                            <option value="1">USD</option>
                            <option value="2">GEL</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex items-center flex-row">
                <div class="flex mt-4 w-full justify-center items-center flex-col">
                    <div class="mt-4 w-full">
                        <InputLabel for="card_name" value="პროცენტი"/>
                        <TextInput id="card_name" type="text" class="mt-1 block w-full border border-black"
                                   v-model="percent" required placeholder="Soul Goodman"
                                   autocomplete="card_name"/>
                    </div>
                    <div class="mt-4 w-full">
                        <InputLabel for="card_name" value="პროცენტი"/>
                        <TextInput id="card_name" type="text" class="mt-1 block w-full border border-black"
                                   v-model="percent" required placeholder="Soul Goodman"
                                   autocomplete="card_name"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full mt-12 flex justify-center items-center flex-col">
            <div class="w-full max-w-[500px] text-center">
                <InputLabel for="return_date" value="დაბრუნების თარიღი"/>
                <input class="w-full" id="return_date" type="date">
            </div>
        </div>
    </div>
</template>

<script>
import Checkbox from "@/Components/Checkbox.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";

export default {
    name: "BorrowMoney",
    components: {Checkbox, TextInput, InputLabel, InputError,},
    data() {
        return {
            moneyRange: 0,
            percent: 10,
        }
    },
    methods: {
        checkForValidInput() {
            if (this.moneyRange > 500) {
                this.moneyRange = 500;
            }
            if (this.moneyRange < 0) {
                this.moneyRange = 0;
            }
        }
    }
}
</script>
