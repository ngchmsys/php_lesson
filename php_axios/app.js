const getTest = document.getElementById('getTest');
const postTest = document.getElementById('postTest');
const putTest = document.getElementById('putTest');
const deleteTest = document.getElementById('deleteTest');
const patchTest = document.getElementById('patchTest');
const result = document.getElementById('result');

const draw = (res) => {
    if(result.hasChildNodes()) {
        result.removeChild(result.firstChild);
    }
    ul = document.createElement('ul');
    console.log(res);
    for(let k in res.data) {
        tag = document.createElement('li');
        str = document.createTextNode(k +': ['+ res.data[k]['id'] + ']: ' + res.data[k]['name']);
        tag.appendChild(str);
        ul.appendChild(tag);
    }
    result.appendChild(ul);
}

getTest.onclick = function(e) {
    axios.get('./api.php')
    .then(function(res) {
        draw(res);
        console.log(res);
    })
    .catch(function(e) {
        console.log(e);
    })
    .then(function() {
        console.log('The get method was done.');
    });
};

postTest.onclick = function(e) {
    axios({
        method: 'post',
        url: './api.php',
        data: {
            id: 10,
            name: 'Test10'
        }
    })
    .then(function(res) {
        draw(res);
        console.log(res);
    })
    .catch(function(e) {
        console.log(e);
    })
    .then(function() {
        console.log('The post method was done.');
    });
};

putTest.onclick = function(e) {
    axios({
        method: 'put',
        url: './api.php',
        data: {
            id: 1,
            name: 'Test11'
        }
    })
    .then(function(res) {
        draw(res);
        console.log(res);
    })
    .catch(function(e) {
        console.log(e);
    })
    .then(function() {
        console.log('The put method was done.');
    });
};

deleteTest.onclick = function(e) {
    axios({
        method: 'delete',
        url: './api.php',
        data: {
            id: 2
        }
    })
    .then(function(res) {
        draw(res);
        console.log(res);
    })
    .catch(function(e) {
        console.log(e);
    })
    .then(function() {
        console.log('The delete method was done.');
    });
};

patchTest.onclick = function(e) {
    axios({
        method: 'patch',
        url: './api.php',
        data: {
            id: 2
        }
    })
    .then(function(res) {
        console.log(res);
    })
    .catch(function(e) {
        console.log(e);
    })
    .then(function() {
        console.log('The patch method was done.');
    });
};
