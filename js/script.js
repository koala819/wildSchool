const argonautsListe = document.querySelector('#argonaut-list');
const form = document.querySelector('#add-member-form');

// create element and render agonaut
function renderArgonaut(doc) {
    let li = document.createElement('li');
    let name = document.createElement('span');

    li.setAttribute('data-id', doc.id);
    name.textContent = doc.data().name;

    li.appendChild(name);

    argonautsListe.appendChild(li);
}

// getting data
db.collection('argonauts').get().then((snapshot) => {
    snapshot.docs.forEach(doc => {
        renderArgonaut(doc);
    })
}); 

// saving data
form.addEventListener('submit', (e) => {
    e.preventDefault();
    db.collection('argonauts').add({
        name: form.name.value
    })
    form.name.value = '';
})