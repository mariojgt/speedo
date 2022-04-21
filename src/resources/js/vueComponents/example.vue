<template>
    <div>i am here</div>
</template>

<script setup>
// trigger event start
// Create a event that we goin to trigger on the store
const emit = defineEmits(["update:reload"]);
const updateMethod = async () => {
    // event to update the table
    emit("update:reload");
};
// trigger event end

// reciver event start
const reloadData = async () => {
    console.log('reload me');
};
// reciver event end
</script>
