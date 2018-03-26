//网站配置
window.hostConfig = {
    host: window.location.href.match(/(\w+)/g)[1],
    hostCheck: /^(tst\w+)|(dev\w+)/.test(window.location.href.match(/(\w+)/g)[1])
}
window.domainConfig = {
    environment: window.hostConfig.hostCheck ? window.hostConfig.host.substring(0, 3) : ""
}
window.urlConfig = {
    user: "http://" + window.domainConfig.environment + "user.360kad.com",
    pc: "http://" + window.domainConfig.environment + "www.360kad.com",
    m: "http://" + window.domainConfig.environment + "m.360kad.com",
    cart: "http://" + window.domainConfig.environment + "cart.360kad.com",
    app: (!!navigator.userAgent.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/)?"https://":"http://") + window.domainConfig.environment + "app.360kad.com",/*暂时ios用https,安卓部分webview连图片都阻塞掉了*/
    search: "http://" + window.domainConfig.environment + "search.360kad.com",
    pay: "http://" + window.domainConfig.environment + "pay.360kad.com",
    res: "http://" + window.domainConfig.environment + "res.360kad.com",
    help: "http://" + window.domainConfig.environment + "help.360kad.com",
    vmall: "http://" + window.domainConfig.environment + "vmall.360kad.com",
    ask: "http://" + window.domainConfig.environment + "ask.360kad.com",
    multiDomain: {
        pc: function () {
            return !window.hostConfig.hostCheck ? this.randomDomainName("http://www{0}.360kad.com", 1, false) : window.urlConfig.pc;
        },
        res: function () {
            return !window.hostConfig.hostCheck ? this.randomDomainName("http://res{0}.360kad.com", 5, true) : window.urlConfig.res;
        },
        randomDomainName: function (format, max, containsNoNumbers) {
            var num;
            if (containsNoNumbers) {
                num = Math.round(Math.random() * max);//0表示不带数字的地址
            } else {
                num = Math.ceil(Math.random() * max);//禁止出现0
            }
            return format.replace(/\{0\}/g, num == 0 ? "" : num);
        }
    }
}