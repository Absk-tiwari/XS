export const PromoVideo = ({ play, videoUrl, onVideoPlay, image }) => {
  return (
    <>
      <img src={process.env.NEXT_PUBLIC_BASE_PATH+image} className='js-img' alt='' />
      <iframe
        autoPlay
        src={process.env.NEXT_PUBLIC_BASE_PATH+videoUrl}
        allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope'
      ></iframe>
      {!play && (
        <div className='info-blocks__item-img-overlay'>
          <span>Promotion video</span>
          <div onClick={onVideoPlay} className='info-blocks__item-img-play'>
            <img src={process.env.NEXT_PUBLIC_BASE_PATH+'/assets/img/play-btn.png'} className='js-img' alt='' />
          </div>
        </div>
      )}
    </>
  );
};
