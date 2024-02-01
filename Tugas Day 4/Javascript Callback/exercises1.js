function fetchUserData(username, callback) {
    const apiUrl = `https://api.github.com/users/${username}`;
    fetch(apiUrl)
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            callback(null, data);
        })
        .catch(error => {
            callback(error, null);
        });
}
const username = "RindangTavip";
const callbackFunction = (error, data) => {
    if (error) {
        console.error(`Error: ${error.message}`);
    } else {
        console.log("Data dari GitHub API:", data);
    }
};
fetchUserData(username, callbackFunction);
