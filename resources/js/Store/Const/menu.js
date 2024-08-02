export const Menu = [
    {
        route: route('home'),
        routeName: 'Trang chủ',
        icon: 'bi bi-house text-[20px] mr-[8px]',
        isLogin: false,
        action: 'redirect'
    },
    {
        route: '',
        routeName: 'Danh mục sản phẩm',
        icon: 'bi bi-list-ul text-[22px] mt-[2px] mr-[8px]',
        routeList: [
            {
                route: route('home'),
                routeName: 'Quần áo Nam',
                action: 'redirect',
            },
            {
                route: route('home'),
                routeName: 'Quần áo Nữ',
                action: 'redirect',
            },
            {
                route: route('home'),
                routeName: 'Điện thoại',
                action: 'redirect',
            },
        ],
        isLogin: false,
        action: 'redirect',
    },
    {
        route: route('cart'),
        routeName: 'Giỏ hàng',
        icon: 'bi bi-cart text-[20px] mr-[8px]',
        action: 'redirect',
    },
    {
        route: route('home'),
        routeName: 'Cuộc trò chuyện',
        icon: 'bi bi-chat text-[20px] mr-[8px]',
        isLogin: true,
        action: 'redirect',
    },
    {
        route: '',
        routeName: 'Quản lý tài khoản',
        icon: 'bi bi-gear text-[20px] mr-[8px]',
        routeList: [
            {
                route: route('buyer.profile'),
                routeName: 'Quản lý thông tin cá nhân',
                action: 'redirect',
            },
            {
                route: route('buyer.order'),
                routeName: 'Đơn mua',
                action: 'redirect',
            },
            {
                route: route('buyer.notice'),
                routeName: 'Thông báo',
                action: 'redirect',
            },
            {
                route: route('buyer.ship'),
                routeName: 'Địa chỉ giao hàng',
                action: 'redirect',
            },
        ],
        isLogin: true,
        action: 'redirect',
    },
    {
        route: '',
        routeName: 'Quản lý trang bán hàng',
        icon: 'bi-shop-window text-[20px] mr-[8px]',
        routeList: [
            {
                route: route('maker.my-sell'),
                routeName: 'Đơn đặt hàng',
                action: 'redirect',
            },
            {
                route: route('maker.purchase-order'),
                routeName: 'Trang bán hàng',
                action: 'redirect',
            },
        ],
        isLogin: true,
        action: 'redirect',
    },
    {
        route: '',
        routeName: 'Đăng xuất',
        icon: 'bi bi-box-arrow-left text-[20px] mr-[8px]',
        isLogin: true,
        action: 'logout',
    },
]
