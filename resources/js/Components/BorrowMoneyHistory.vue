<template>
    <div class="px-4 sm:px-6 lg:px-8 mb-10">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <p class="mt-2 text-sm text-gray-700">განხილვაში მყოფი სესხები!</p>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table v-if="!offers.length" class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">თანხის ოდენობა</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">გადახდის ბოლო ვადა</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">სტატუსი</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">შეთავაზებები</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="loan in pendingLoans" :key="loan.email">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <div class="flex items-center">
                                            <div class="ml-4">
                                            <div class="font-medium text-gray-900">{{ loan.amount }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <div class="text-gray-900">{{ loan.payment_due_date }}</div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <span v-if="loan.status == 0" class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">Pending</span>
                                    <span v-if="loan.status == 1"  class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                                    <span v-if="loan.status == 2"  class="inline-flex rounded-full bg-red-300 px-2 text-xs font-semibold leading-5 text-red-800">Rejected</span>
                                    <span v-if="loan.status == 3"  class="inline-flex rounded-full bg-purple-300 px-2 text-xs font-semibold leading-5 text-purple-800">Paid</span>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500" v-if="loan.offers">
                                    <button :disabled="!loan.offers.length" v-on:click="this.activePending = loan.id"></button>{{ loan.offers.length  }}</td>
                            </tr>
                            </tbody>
                        </table>
                        <button v-else v-on:click="this.activePending = null">f-</button>
                    </div>
                </div>
                {{offers}}
            </div>
        </div>
    </div>

    <div class="px-4 sm:px-6 lg:px-8 mb-10">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <p class="mt-2 text-sm text-gray-700">თქვენი სესხების ისტორია!</p>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table v-if="!offers.length" class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">თანხის ოდენობა</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">გადახდის ბოლო ვადა</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">სტატუსი</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">მსესხებელი</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="loan in otherLoans" :key="loan.email">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="font-medium text-gray-900">{{ loan.amount }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <div class="text-gray-900">{{ loan.payment_due_date }}</div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <span v-if="loan.status == 0" class="inline-flex rounded-full bg-yellow-100 px-2 text-xs font-semibold leading-5 text-yellow-800">Pending</span>
                                    <span v-if="loan.status == 1"  class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                                    <span v-if="loan.status == 2"  class="inline-flex rounded-full bg-red-300 px-2 text-xs font-semibold leading-5 text-red-800">Rejected</span>
                                    <span v-if="loan.status == 3"  class="inline-flex rounded-full bg-purple-300 px-2 text-xs font-semibold leading-5 text-purple-800">Paid</span>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500" v-if="loan.offers">
                                    <button :disabled="!loan.offers.length" v-on:click="this.activePending = loan.id"></button>{{ loan.offers.length  }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BorrowMoneyHistory",
    props: {
        loans: {
            type: Array,
            required: true
        }
    },
    computed : {
        pendingLoans() {
            return this.loans.filter(loan => loan.status === 0)
        },
        otherLoans() {
            return this.loans.filter(loan => loan.status !== 0)
        },
        offers() {
            if(this.activePending) {
                return this.loans.filter(loan => loan.id === this.activePending)[0].offers
            }
            return []
        }

    },
    data() {
        return {
            activePending : null,
        }
    },
}
</script>
