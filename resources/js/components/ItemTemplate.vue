<template>
    <div class="item-template">
        <p>{{ item.name }}</p>
    </div>
</template>

<script>
export default {
    props: {
        item: { required: true },
    },
}
</script>