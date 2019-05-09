<template>
    <div :class="card.divide">
        <runtime-component v-if="card.view" :template="card.view"></runtime-component>
    </div>
</template>

<script>

    const RuntimeComponent = {
        functional: true,
        template: '#dynamic',
        props: ['template'],
        render(h, context) {
            const template = context.props.template
            const component = template ? { template } : {}
            return h(component)
        }
    }


    export default {
        props: [
        'card',

// The following props are only available on resource detail cards...
// 'resource',
// 'resourceId',
'resourceName',
],

components: {
    RuntimeComponent
},

data: () => ( {
    ready: false
}),

mounted() {

    if (this.card.hideResourceDetail) {
        const resourceDetail = document.querySelector(`[dusk="${this.resourceName}-detail-component"]`);

        resourceDetail.remove()
    }


    if (this.card.hideResourceIndex) {
        const resourceIndex = document.querySelector(`[dusk="${this.resourceName}-index-component"]`);

        while (resourceIndex.childNodes.length > 3) {
            resourceIndex.removeChild(resourceIndex.lastChild);
        }
    }
}
}
</script>
