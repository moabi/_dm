

/**
 * Actual demo
 */

var demo = new Vue({

    el: '#vue-app',

    data: {
        terms: [],
        currentTerm: {
            'id': 13,
            'name': 'CMS'
        },
        assets_posts: [],
        apiURL : 'https://api.github.com/repos/vuejs/vue/commits?per_page=3&sha=',
        root: document.location.href,
        wpasset: 'wp-json/wp/v2/assets_post_type?per_page=99&type=',
        terms_route: 'wp-json/wp/v2/type?per_page=99'
    },

    created: function () {
        this.fetchTermsData();
        this.fetchData();
    },

    watch: {
        currentTerm: function (termID) {
            this.currentTerm = termID;
            this.fetchData();
        }
    },

    filters: {
        formatDate: function (v) {
            return v.replace(/T|Z/g, ' ');
        },
        hostName: function (v) {
            var getLocation = function(href) {
                var l = document.createElement("a");
                l.href = href;
                return l;
            };
            var l = getLocation(v);

            return l.hostname;
        },
        clearBit:function (v) {
            var getLocation = function(href) {
                var l = document.createElement("a");
                l.href = href;
                return l;
            };
            var l = getLocation(v);
            return 'https://logo.clearbit.com/' + l.hostname;
        }
    },

    methods: {
        fetchData: function () {
            var xhr = new XMLHttpRequest();
            var self = this;
            xhr.open('GET', self.root + self.wpasset + self.currentTerm.id);
            xhr.onload = function () {
                try{
                    self.assets_posts = JSON.parse(xhr.responseText);
                } catch (e){
                    console.log(xhr.responseText)
                }

            };
            xhr.send();
        },
        fetchTermsData: function () {
            var xhr = new XMLHttpRequest();
            var self = this;
            xhr.open('GET', self.root + self.terms_route);
            xhr.onload = function () {
                try{
                    self.terms = JSON.parse(xhr.responseText);
                } catch (e){
                    console.warn(e);
                }


            };
            xhr.send();
        }
    }
});