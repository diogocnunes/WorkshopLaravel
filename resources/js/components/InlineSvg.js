export default {
    props: ['name'],

    render(h) {
        return h('svg', {
            domProps: {
                innerHtml: require('../../../public/images/svg/' + this.name + '.svg')
            }
        });
    }
}
