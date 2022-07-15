{% include "header.php" %}
    <div class="wrapper">
        <section class="section">    
            <form method="post" action="{{path}}sailboat/store">
                <h1>Ajout d'un voilier</h1>
                {% if errors is defined %}
                    <span class="error">{{ errors|raw }}</span>
                {% endif %}
                <div>
                    <label for="name">Nom: </label>
                    <input type="text" id="name" name="name" maxlength="45" value="{{ sailboat.name }}">
                </div>
                <div>
                    <label for="sailboat_type_id">Type: </label>
                    <select name="sailboat_type_id" id="sailboat_type_id">
                    {% for type in types %}
                        <option value="{{ type.id }}" {% if type.id==sailboat.sailboat_type_id %} selected {% endif %}>{{ type.name}}</option>
                    {% endfor %}
                </select>
                </div>
                <div>
                    <input type="submit" value="Envoyer">
                </div>
            </form>
        </section>
    </div>
</body>
</html>