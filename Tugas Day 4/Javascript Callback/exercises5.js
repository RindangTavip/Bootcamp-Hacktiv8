function fetchPosts() {
    return fetch('https://jsonplaceholder.typicode.com/posts')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .catch(error => {
            throw new Error(`Error fetching posts: ${error.message}`);
        });
}

function fetchComments() {
    return fetch('https://jsonplaceholder.typicode.com/comments')
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .catch(error => {
            throw new Error(`Error fetching comments: ${error.message}`);
        });
}

// Menggunakan chaining promise untuk mengambil data posts dan comments
fetchPosts()
    .then(posts => {
        console.log('Jumlah posts:', posts.length);
        return fetchComments();  // Melakukan chaining untuk mengambil data comments
    })
    .then(comments => {
        console.log('Jumlah comments:', comments.length);
    })
    .catch(error => {
        console.error('Error:', error.message);
    });