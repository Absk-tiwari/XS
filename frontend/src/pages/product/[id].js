import { MostViewed } from 'components/shared/MostViewed/MostViewed';
import { ProductDetails } from 'components/Product/ProductDetails/ProductDetails';
import productData from 'data/product/product';
const { PublicLayout } = require('layout/PublicLayout');

const breadcrumbsData = [
  { label: 'Home', path: '/' },
  { label: 'Shop', path: '/shop' },
  { label: 'Product', path: '/product' },
];

const SingleProductPage = ({ post }) => {
  if (!post) {
    return <h1>Product Not Found</h1>; // Fallback UI
  }

  return (
    <PublicLayout breadcrumb={breadcrumbsData} breadcrumbTitle="Shop">
      <ProductDetails product={post} />
      <MostViewed additionalClass="product-viewed" />
    </PublicLayout>
  );
};

export default SingleProductPage;

export async function getStaticPaths() {
  const paths = productData.map((post) => ({
    params: { id: post.id.toString() }, // Ensure ID is a string
  }));

  return { paths, fallback: 'blocking' }; // Allows new pages to be generated dynamically
}

export async function getStaticProps({ params }) {
  const post = productData.find((item) => item.id.toString() === params.id); // Use find() instead of filter()

  if (!post) {
    return { notFound: true }; // Correctly return 404 if product is missing
  }

  return {
    props: { post },
    revalidate: 10, // ISR: Regenerate page every 10 seconds
  };
}
