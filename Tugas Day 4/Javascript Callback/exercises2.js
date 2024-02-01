function fetchUserData(username) {
    const apiUrl = `https://api.github.com/users/${username}`;
    return new Promise((resolve, reject) => {
        fetch(apiUrl)
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                resolve(data);
            })
            .catch(error => {
                reject(error);
            });
    });
}
const username = "RindangTavip";
fetchUserData(username)
    .then(data => {
        console.log("Data dari GitHub API:", data);
    })
    .catch(error => {
        console.error(`Error: ${error.message}`);
    });
