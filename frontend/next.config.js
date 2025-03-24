module.exports = {
    async rewrites() {
        return [
            {
                source: "/api/:path*",
                destination: "http://localhost/XS/public/api/:path*",
            },
        ];
    },
    basePath:'/XS/public',
    assetPrefix: 'http://localhost/XS/public/store',
    images: {
        loader: 'default',
        path: '/XS/public/store/assets/img', // Ensures next/image works
    },
};