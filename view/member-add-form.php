{% include "header.php" %}
    <div class="wrapper">
        <section class="section">    
            <form method="post" action="{{path}}member/store">
                <h1>Ajout d'un membre</h1>
                {% if errors is defined %}
                    <span class="error">{{ errors|raw }}</span>
                {% endif %}
                    <div>
                        <label for="first_name">Prénom: </label>
                        <input type="text" id="first_name" name="first_name" maxlength="20" value="{{ member.first_name }}">
                    </div>
                    <div>
                        <label for="last_name">Nom: </label>
                        <input type="text" id="last_name" name="last_name" maxlength="20" value="{{ member.last_name }}">
                    </div>
                    <div>
                        <label for="email">Courriel: </label>
                        <input type="email" id="email" name="email" maxlength="40" value="{{ member.email }}">
                    </div>
                    <div>
                        <label for="phone">Téléphone: </label>
                        <input type="text" id="phone" name="phone" maxlength="30" value="{{ member.phone }}">
                    </div>
                    <div>
                        <input type="submit" value="Envoyer">
                    </div>
                </form>
        </div>
    </div>
</body>
</html>