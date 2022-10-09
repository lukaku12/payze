<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/inertia-vue3';
import BorrowMoney from "@/Components/BorrowMoney.vue";
import { usePage } from '@inertiajs/inertia-vue3';
import {computed} from "vue";
import BorrowMoneyHistory from "@/Components/BorrowMoneyHistory.vue";
import BorrowerMoneyHistory from "@/Components/BorrowerMoneyHistory.vue";

const page = usePage();

const loans = computed(function () {
    return page.props.value.loans;
});
const pendingLoans = computed(function () {
    return page.props.value.pendingLoans;
});
const myOffers = computed(function () {
    return page.props.value.myOffers;
});
function getSearchParameters() {
    var prmstr = window.location.search.substr(1);
    return prmstr != null && prmstr != "" ? transformToAssocArray(prmstr) : {};
}

function transformToAssocArray( prmstr ) {
    var params = {};
    var prmarr = prmstr.split("&");
    for ( var i = 0; i < prmarr.length; i++) {
        var tmparr = prmarr[i].split("=");
        params[tmparr[0]] = tmparr[1];
    }
    return params;
}

var params = getSearchParameters();


</script>

<template>
    <Head title="Dashboard" />
    <AuthenticatedLayout v-if="params && params.page == 2">
        <template #header>
            <span class="font-semibold text-xl text-gray-800 leading-tight">
                გამსესხებლის გარემო
            </span>
        </template>
        <BorrowerMoneyHistory :loans="pendingLoans" :myOffers="myOffers"/>
    </AuthenticatedLayout>
    <AuthenticatedLayout v-else>
        <template #header>
            <span class="font-semibold text-xl text-gray-800 leading-tight">
                სამუშაო დაფა
            </span>
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
