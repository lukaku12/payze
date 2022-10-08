<template>
    <div v-for="loan in loans" class="my-2 bg-red-500">
        ({{ loan.id}}id)
        ({{ loan.amount}} amount)
        ({{ loan.lender}} lender)
        ({{ loan.demand_interest_rate}}demand_interest_rate)

        ({{loan.offers}})

        ({{ loan.payment_due_date}} payment_due_date)
        ({{ loan.return_date}} return_date)
        ({{ loan.percent}} percent)
        ({{ loan.status}} status)
        ({{ loan.detail}} detail)
    </div>
    <div class="px-4 sm:px-6 lg:px-8 mb-10">
        <div class="sm:flex sm:items-center">
            <div class="sm:flex-auto">
                <p class="mt-2 text-sm text-gray-700">შეამოწმეთ თქვენი სესხების ისტორია!</p>
            </div>
        </div>
        <div class="mt-8 flex flex-col">
            <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-300">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">თანხის ოდენობა</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">გადახდის ბოლო დრო</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">სტატუსი</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">მსესხებელი</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                            <tr v-for="loan in loans" :key="loan.email">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                                    <div class="flex items-center">
                                            <div class="ml-4">
                                            <div class="font-medium text-gray-900">{{ loan.amount }}</div>
                                            <div class="text-gray-500">{{ loan.email }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <div class="text-gray-900">{{ loan.title }}</div>
                                    <div class="text-gray-500">{{ loan.department }}</div>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <span class="inline-flex rounded-full bg-green-100 px-2 text-xs font-semibold leading-5 text-green-800">Active</span>
                                </td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ loan.role }}</td>
                                <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                    >Edit<span class="sr-only">, {{ loan.name }}</span></a
                                    >
                                </td>
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
    }
}
</script>
