const searchMarqueInput = document.getElementById('searchMarqueInput');
const searchModeleInput = document.getElementById('searchModeleInput');
const searchPrixMinInput = document.getElementById('searchPrixMinInput');
const searchPrixMaxInput = document.getElementById('searchPrixMaxInput');
const searchAnneeInput = document.getElementById('searchAnneeInput');
const searchKmInput = document.getElementById('searchKmInput');
const cards = document.querySelectorAll('.col-4.voitures_card');
const clearFiltersButton = document.getElementById('clearFiltersButton');
const filters = {
marque: "",
modele: "",
prix: {
min: "",
max: ""
},
annee: "",
km: ""
};

searchMarqueInput.addEventListener('input', filterByMarque);
searchModeleInput.addEventListener('input', filterByModele);
searchPrixMinInput.addEventListener('input', filterByPrixMin);
searchPrixMaxInput.addEventListener('input', filterByPrixMax);
searchAnneeInput.addEventListener('input', filterByAnnee);
searchKmInput.addEventListener('input', filterByKm);

function resetCardDisplay() {
cards.forEach(function (card) {
card.style.display = 'block';
});
}

function filterByMarque() {
filters.marque = searchMarqueInput.value.toLowerCase();
applyFilters();
}

function filterByModele() {
filters.modele = searchModeleInput.value.toLowerCase();
applyFilters();
}

function filterByPrixMin() {
filters.prix.min = searchPrixMinInput.value.toLowerCase();
applyFilters();
}

function filterByPrixMax() {
filters.prix.max = searchPrixMaxInput.value.toLowerCase();
applyFilters();
}

function filterByAnnee() {
filters.annee = parseInt(searchAnneeInput.value);
applyFilters();
}

function filterByKm() {
filters.km = parseInt(searchKmInput.value);
applyFilters();
}

function applyFilters() {
resetCardDisplay();
cards.forEach(function (card) {
const marqueElement = card.querySelector('.marque');
const modeleElement = card.querySelector('.modele');
const prixElement = card.querySelector('.prix');
const anneeElement = card.querySelector('.annee');
const kmElement = card.querySelector('.km');
const marque = marqueElement.textContent.toLowerCase();
const modele = modeleElement.textContent.toLowerCase();
const prix = parseFloat(prixElement.textContent);
const minPrice = parseFloat(filters.prix.min);
const maxPrice = parseFloat(filters.prix.max);
const annee = parseInt(anneeElement.textContent);
const km = parseInt(kmElement.textContent);

if (! marque.includes(filters.marque) || ! modele.includes(filters.modele) || (minPrice !== "" && prix < minPrice) || (maxPrice !== "" && prix > maxPrice) || (filters.annee !== "" && annee < parseInt(filters.annee)) || (filters.km !== "" && km > parseInt(filters.km))) {
card.style.display = 'none';
}
});
}

clearFiltersButton.addEventListener('click', function () {
searchMarqueInput.value = '';
searchModeleInput.value = '';
searchPrixMinInput.value = '';
searchPrixMaxInput.value = '';
searchAnneeInput.value = '';
searchKmInput.value = '';
filters.marque = '';
filters.modele = '';
filters.prix.min = '';
filters.prix.max = '';
filters.annee = '';
filters.km = '';
applyFilters();
});
