function Bouton() {
    const formulaire = document.getElementById('modif_info');
    const boutonModifier = document.getElementById('modif_button');
    const boutonAnnuler = document.getElementById('annuler_button');
    const boutonEnregistrer = document.getElementById('enregistrer_button');

    if (!formulaire || !boutonModifier || !boutonAnnuler || !boutonEnregistrer) return;

    const valeursInitiales = {};
    Array.from(formulaire.elements).forEach(element => {
        if (element.name) {
            valeursInitiales[element.name] = element.value;
        }
        element.disabled = true;
    });

    boutonModifier.addEventListener('click', () => {
        Array.from(formulaire.elements).forEach(element => {
            element.disabled = false;
        });
        boutonAnnuler.style.display = 'inline-block';
        boutonEnregistrer.style.display = 'inline-block';
        boutonModifier.style.display = 'none';
    });

    boutonAnnuler.addEventListener('click', () => {
        Array.from(formulaire.elements).forEach(element => {
            if (element.name && valeursInitiales[element.name] !== undefined) {
                element.value = valeursInitiales[element.name];
            }
            element.disabled = true;
        });
        boutonAnnuler.style.display = 'none';
        boutonEnregistrer.style.display = 'none';
        boutonModifier.style.display = 'inline-block';
    });
}

function Verif_informations_inscription() {
    const ChampPrenom = document.getElementById('champ-prenom');
    const ChampNom = document.getElementById('champ-nom');
    const ChampEmail = document.getElementById('champ-email');
    const ChampMotdepasse = document.getElementById('champ-motdepasse');

    if (!ChampPrenom || !ChampNom || !ChampEmail || !ChampMotdepasse) return false;

    if (ChampPrenom.value.trim() === "") {
        alert("Le prénom ne peut pas être vide.");
        return false;
    }

    if (ChampNom.value.trim() === "") {
        alert("Le nom ne peut pas être vide.");
        return false;
    }

    if (ChampEmail.value.trim() === "") {
        alert("L'adresse email ne peut pas être vide.");
        return false;
    }

    if (ChampMotdepasse.value.trim() === "") {
        alert("Le mot de passe ne peut pas être vide.");
        return false;
    }

    return true;
}

function Verif_informations_connexion() {
    const ChampEmail = document.getElementById('champ-email');
    const ChampMotdepasse = document.getElementById('champ-motdepasse');

    if (!ChampEmail || !ChampMotdepasse) return false;

    if (ChampEmail.value.trim() === "") {
        alert("L'adresse email ne peut pas être vide.");
        return false;
    }

    if (ChampMotdepasse.value.trim() === "") {
        alert("Le mot de passe ne peut pas être vide.");
        return false;
    }

    return true;
}

document.addEventListener("DOMContentLoaded", function () {
    const btn = document.getElementById("affichage_motdepasse");
    const input = document.getElementById("champ-motdepasse");

    if (btn && input) {
        const icon = btn.querySelector("i");
        if (icon) {
            btn.addEventListener("click", function () {
                const isPassword = input.type === "password";
                input.type = isPassword ? "text" : "password";
                icon.classList.toggle("fa-eye");
                icon.classList.toggle("fa-eye-slash");
            });
        }
    }

    const compteur = document.getElementById("compteur-mdp");
    if (input && compteur) {
        input.addEventListener("input", function () {
            const longueur = input.value.length;
            compteur.textContent = `${longueur}/16`;
        });
    }

    Bouton();
});
