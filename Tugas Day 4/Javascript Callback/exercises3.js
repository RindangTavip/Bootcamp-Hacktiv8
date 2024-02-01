function loadImage(imageUrl, successCallback, errorCallback) {
    const img = new Image();
    img.onload = function() {
        successCallback(img);
    };
    img.onerror = function() {
        errorCallback(new Error(`Failed to load image from URL: ${imageUrl}`));
    };
    img.src = imageUrl;
}
const imageUrl = "https://www.hacktiv8.com/_next/image?url=%2Flogo.png&w=1920&q=75";
const successCallback = (image) => {
    console.log("Image loaded successfully:", image);
};
const errorCallback = (error) => {
    console.error("Error loading image:", error.message);
};
loadImage(imageUrl, successCallback, errorCallback);