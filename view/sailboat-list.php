{% include "header.php" %}
    <div class="wrapper">
        <section class="section">
            <h1>Liste des voiliers</h1>
            <table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Type</th>
                        <th>Minimum d'équipiers</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    {% for sailboat in sailboats %} 
                        <tr>
                            <td>{{ sailboat.name }}</a></td>
                                {% for type in types %}
                                    {% if type.id == sailboat.sailboat_type_id %}
                                    <td>{{ type.name }}</td>
                                    <td>{{ type.min_crew_size }}</td>
                                    {% endif %}
                                {% endfor %}
                            <td>
                                <a href="{{path}}sailboat/delete/{{sailboat.id}}"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>
            <a href="{{path}}sailboat/add">Ajouter un voilier</a>
        </section>
    </div>
</body>
</html>