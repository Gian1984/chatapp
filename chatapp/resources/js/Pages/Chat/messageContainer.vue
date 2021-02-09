<template>
    <div class="h-96 w-full">
        <div class="h-full p-2 flex flex-col-reverse overflow-scroll">
            <!-- here we loop trough all the messages and create a var message where we can keep all the
            info and we add a index that will be add with the :key index  -->
            <div v-for="(message, index) in messages" :key="index">
                <message-item :message="message" />
            </div>
        </div>
    </div>
</template>

<script>
import messageItem from './messageItem.vue'
export default {
  components: { messageItem },
    props:['messages']
}
</script>