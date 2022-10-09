<template>
    <div class="pb-16">
        <h1 class="text-center text-[38px] text-purple-700 font-bold">აიღეთ სესხი მარტივად!</h1>
        <div class="flex flex-col md:flex-row gap-32">
            <div class="w-full md:w-1/2 flex flex-col items-center">
                <div class="flex flex-col w-full mt-4">
                    <div class="mt-4 w-full flex flex-col items-center gap-y-10">
                        <div class="w-full flex flex-col justify-center items-center">
                            <div>
                                <input class="w-[70px] h-[40px] border-none focus:ring-0" v-model="moneyRange"
                                       @change="checkForValidInput" type="text" min="0"
                                       max="500">{{ currency === 'GEL' ? 'GEL' : 'USD' }}
                            </div>
                            <input class="w-full" v-model="moneyRange" @change="checkForValidInput" type="range" min="0"
                                   max="500">
                        </div>
                        <select v-model="currency" class="w-full rounded focus:ring-0 mt-10">
                            <option value="აირჩიე ვალუტა" selected disabled>აირჩიე ვალუტა</option>
                            <option value="USD">USD</option>
                            <option value="GEL">GEL</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="w-full md:w-1/2 flex items-center flex-row">
                <div class="flex mt-4 w-full justify-center items-center flex-col">
                    <div class="mt-4 w-full">
                        <div class="w-full">
                            <InputLabel for="return_date" value="დაბრუნების თარიღი"/>
                            <input class="w-full rounded" id="return_date" type="date">
                        </div>
                    </div>
                    <div class="mt-12 w-full">
                        <InputLabel for="card_name" value="პროცენტი"/>
                        <TextInput id="card_name" type="text" class="mt-1 block w-full border border-black"
                                   v-model="percent" required placeholder="Soul Goodman"
                                   autocomplete="card_name"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-20 h-[50px] w-full relative h-[40px">
            <button
                class="bg-purple-700 text-[25px] absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 flex justify-between items-center px-10 py-4 mt-[10px] rounded-xl font-bold hover: text-white cursor-pointer">
                მოითხოვე სესხი
            </button>
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
            currency: "აირჩიე ვალუტა",
        }
    },
    methods: {
        checkForValidInput() {
            this.moneyRange = parseInt(this.moneyRange);
            if (this.moneyRange > 500) {
                this.moneyRange = 500;
            }
            if (this.moneyRange < 0) {
                this.moneyRange = 0;
            }
            if (typeof this.moneyRange !== "number" || isNaN(this.moneyRange)) {
                this.moneyRange = 0;
            }
        }
    },
    watch: {
        'moneyRange': function () {
            this.checkForValidInput();
        }
    }
}
</script>
