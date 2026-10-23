export default {
    props: ["mainmenulinks", "currentlink", 'portfoliowork', 'portfolioclose', 'pagedata', 'sitename'],
    data: function () {
        return {
            urlFromDataBase: this.mainmenulinks,
            currentPage: "/",
            title: "",
            pagedataValue: this.pagedata['pages']['current']
        };
    },
    mounted() {
        let self = this;
        this.mainmenulinks.forEach(function callback(currentValue) {
            if (currentValue.link == self.currentlink) {
                self.currentPage = currentValue.link;
                self.title = currentValue.title;
                document.title = currentValue.title;

                if (Object.keys(self.pagedataValue).length > 1) {
                    document.title = self.pagedataValue.header;
                    self.title = self.pagedataValue.header;
                }
                self.putSlashInBrowserAddressBar(currentValue.link);

            }
        });
    },
    methods: {
        getPage(link, urlFromDataBase) {
            this.title = urlFromDataBase.title;
            this.currentPage = link;
            document.title = this.title;
            this.putSlashInBrowserAddressBar(link);
        },
        putSlashInBrowserAddressBar(url) {
            let self = this;
            if (self.currentPage == '/') { history.pushState(null, null, url); return; }
            if (Object.keys(self.pagedataValue).length > 1) {
                history.pushState(null, null, "/" + url + "/" + self.pagedataValue.link + "/");
            } else {
                history.pushState(null, null, "/" + url + "/");
            }
            self.pagedataValue = [];
        },
    },
};
