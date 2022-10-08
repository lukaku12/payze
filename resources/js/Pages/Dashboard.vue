<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import BorrowMoney from "@/Components/BorrowMoney.vue";
import { usePage } from '@inertiajs/inertia-vue3';
import {computed} from "vue";
import BorrowMoneyHistory from "@/Components/BorrowMoneyHistory.vue";

const page = usePage();

const loans = computed(function () {
    return page.props.value.loans;
});
console.log(loans.value);
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                სამუშაო დაფა
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <BorrowMoney />
                    </div>
                </div>
            </div>
        </div>
        <BorrowMoneyHistory :loans="loans"/>
    </AuthenticatedLayout>
</template>
