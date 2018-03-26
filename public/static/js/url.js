//商家配置
window.SellerConfig = {
    //自营商家编码
    kadSellerCode: "f0445f5d-a570-4407-827d-f40dc4a0603e",
    //自营商家名称
    kadSellerName: "广州康爱多",
    //太安堂商家编码
    tatSellerCode: "50",
    //太安堂商家名称
    tatSellerName: "太安堂"
}
//营销活动类型
window.PromoteType = {
    //套餐 Kit
    Kit: "Kit",
    //满数量减
    FullAmountDiscount: "FullAmountDiscount",
    //满数量换购
    FullAmountAdditionalBuy: "FullAmountAdditionalBuy",
    //满数量赠品
    FullAmountGift: "FullAmountGift",
    //满数量送优惠券
    FullAmountGiftPrm: "FullAmountGiftPrm",
    //满金额减
    FullAmtDiscount: "FullAmtDiscount",
    //满金额换购
    FullAmtAdditionalBuy: "FullAmtAdditionalBuy",
    //满金额赠品
    FullAmtGift: "FullAmtGift",
    //满金额送优惠券
    FullAmtGiftPrm: "FullAmtGiftPrm",
    //优惠券
    CouponFullAmtDiscount: "CouponFullAmtDiscount",
    //限时限量折扣
    LimitDiscount: "LimitDiscount",
    //限时限量特价
    Limit: "Limit",
    //单品免运费
    WareFreeShip: "WareFreeShip",
    //区域免运费
    AreaFreeShip: "AreaFreeShip",
    //满金额免运费
    MoneyFreeShip: "MoneyFreeShip",
    //客户等级免邮费
    CusGradeFreeShip: "CusGradeFreeShip",
    //满数量特价
    FullAmountSpecial: "FullAmountSpecial"
}
//获取www商品详情页链接
window.GetProductUrl = function (id) {
    return urlConfig.pc + "/product/" + id + ".shtml";
}
//来源枚举
window.SourceEnum = {
    // PC网站
    PC: 1,
    // 客服代下
    Service: 2,
    // 门店
    Store: 3,
    // 淘宝天猫
    Tmall: 4,
    // 拍拍
    PaiPai: 5,
    // 818平台
    Www818Com: 6,
    // 八百方
    Www800PharmCom: 7,
    // 药房网
    YaoFang: 8,
    // 药城网
    YaoCheng: 9,
    // 配送部
    PeiSong: 10,
    // 买药网
    MaiYao: 11,
    // kad.cn
    KadCn: 12,
    // 手机Wap
    Wap: 13,
    // Android
    Android: 14,
    // IPhone
    IPhone: 15,
    // 京东订单
    JingDong: 16,
    // 苏宁
    SuNing: 17,
    // 当当
    DangDang: 18,
    // 亚马逊
    Amazon: 19,
    /// 微商城
    Vmall: 21
}
//全场满39包邮配置
window.WholeMoneyFreeShipAmt = 39;