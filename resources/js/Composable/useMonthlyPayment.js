import {computed, isRef} from "vue";

export const useMonthlyPayment = (total, interestRate,duration) => {

    const monthlyPayment = computed(() => {

        const principle = total
        const monthlyInterest = interestRate.value/ 100 / 12
        const numberOfPayment = duration.value * 12

        return principle * monthlyInterest * (Math.pow(1 + monthlyInterest, numberOfPayment))
    })

    const totalPaid = computed(() => {
        return (isRef(duration) ? duration.value : duration) * 12 * monthlyPayment.value
    })

    const totalInterest = computed(() => totalPaid.value - (isRef(total) ? total.value : total))
    return {monthlyPayment, totalPaid, totalInterest}
}
