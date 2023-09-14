export const Menu = [
    {
        route: route('home'),
        routeName: 'Trang chủ',
        icon: 'bi bi-house text-[20px] mr-[8px]'
    },
    {
        route: '',
        routeName: 'Danh mục sản phẩm',
        icon: 'bi bi-list-ul text-[22px] mt-[2px] mr-[8px]',
        routeList: [
            {
                route: route('home'),
                routeName: 'Quần áo Nam'
            },
            {
                route: route('home'),
                routeName: 'Quần áo Nữ'
            },
            {
                route: route('home'),
                routeName: 'Điện thoại'
            },
        ]
    },
    {
        route: route('cart'),
        routeName: 'Giỏ hàng',
        icon: 'bi bi-cart text-[20px] mr-[8px]'
    },
    {
        route: route('home'),
        routeName: 'Cuộc trò chuyện',
        icon: 'bi bi-chat text-[20px] mr-[8px]'
    },
    {
        route: '',
        routeName: 'Quản lý trang bán hàng',
        icon: 'bi-shop-window text-[20px] mr-[8px]',
        routeList: [
            {
                route: route('maker.my-sell'),
                routeName: 'Đơn đặt hàng'
            },
            {
                route: route('maker.purchase-order'),
                routeName: 'Trang bán hàng'
            },
        ]
    },
    {
        route: '',
        routeName: 'Quản lý tài khoản',
        icon: 'bi bi-gear text-[20px] mr-[8px]',
        routeList: [
            {
                route: route('setting.profile'),
                routeName: 'Quản lý thông tin cá nhân'
            },
            {
                route: route('setting.order'),
                routeName: 'Đơn mua'
            },
            {
                route: route('setting.notice'),
                routeName: 'Thông báo'
            },
            {
                route: route('setting.ship'),
                routeName: 'Địa chỉ giao hàng'
            },
        ]
    },
]
