<template id="employees-template">
    <h1>Anställda</h1>
    <ul class="employees">
        <li v-for="employee in employees | orderBy 'clicks_total' -1">
            <a href="javascript:void(0);" @click="increaseCount(employee)">
                {{ employee.name }}
            </a>
            <span class="count" @click="decrementCount(employee)">{{ employee.clicks_today }}</span>
        </li>
    </ul>
</template>

<script>
    export default {
        template: '#employees-template',
        data: function() {
            return {
                employees: []
            }
        },
        created: function() {
            this.fetchEmployees();
        },
        methods: {
            fetchEmployees: function() {
                $.getJSON('employees', function(data) {
                    this.employees = data;
                }.bind(this));
            },
            increaseCount: function(employee) {
                $.post('employees/increase/' + employee.id, function() {
                    employee.clicks_today++;
                    employee.clicks_total++;
                }.bind(this));
            },
            decrementCount: function(employee) {
                if (employee.clicks_today > 0) {
                    $.post('employees/decrement/' + employee.id, function() {
                        employee.clicks_today--;
                        employee.clicks_total--;
                    }.bind(this));
                }
            }
        }
    }
</script>
