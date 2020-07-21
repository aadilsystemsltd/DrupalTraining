<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* sites/all/modules/custom/events/templates/bootstrap_table.html.twig */
class __TwigTemplate_44c532307ed38c7e09933c6e42529aa412ad84b7b67c793e63c83cae5d27c5b2 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 4];
        $filters = ["escape" => 6, "length" => 13];
        $functions = ["range" => 13];

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape', 'length'],
                ['range']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<table class=\"table table-striped\">
\t<thead>
\t\t<tr>
\t\t\t";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["header"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 5
            echo "\t\t\t\t<th scope=\"col\">
\t\t\t\t\t";
            // line 6
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["i"]), "html", null, true);
            echo "
\t\t\t\t</th>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "\t\t</tr>
\t</thead>

\t\t<tbody>
\t\t";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(0, (twig_length_filter($this->env, ($context["rows"] ?? null)) - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 14
            echo "\t\t\t\t<tr>
\t\t\t\t\t";
            // line 15
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["rows"] ?? null), $context["i"], [], "array"));
            foreach ($context['_seq'] as $context["_key"] => $context["td"]) {
                // line 16
                echo "\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t";
                // line 17
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["td"], "id", [], "array")), "html", null, true);
                echo "
\t\t\t\t\t\t</td>
\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['td'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 20
            echo "\t\t\t\t</tr>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 22
        echo "\t</tbody>

</table>
";
    }

    public function getTemplateName()
    {
        return "sites/all/modules/custom/events/templates/bootstrap_table.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 22,  105 => 20,  96 => 17,  93 => 16,  89 => 15,  86 => 14,  82 => 13,  76 => 9,  67 => 6,  64 => 5,  60 => 4,  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<table class=\"table table-striped\">
\t<thead>
\t\t<tr>
\t\t\t{% for i in header %}
\t\t\t\t<th scope=\"col\">
\t\t\t\t\t{{ i }}
\t\t\t\t</th>
\t\t\t{% endfor %}
\t\t</tr>
\t</thead>

\t\t<tbody>
\t\t{% for i in 0..(rows|length - 1)%}
\t\t\t\t<tr>
\t\t\t\t\t{% for td in rows[i] %}
\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t{{ td['id'] }}
\t\t\t\t\t\t</td>
\t\t\t\t\t{% endfor %}
\t\t\t\t</tr>
\t\t\t{% endfor %}
\t</tbody>

</table>
{# <td>{{ item }}</td>
\t<td>
\t\t<a href=\"\">Edit</a>
\t</td>
\t<td>
\t\t<a href=\"\">Delete</a>
\t</td> #}
", "sites/all/modules/custom/events/templates/bootstrap_table.html.twig", "D:\\xampp\\htdocs\\drupal\\myFirstProject\\web\\sites\\all\\modules\\custom\\events\\templates\\bootstrap_table.html.twig");
    }
}