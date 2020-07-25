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
class __TwigTemplate_d3bf83586abc7c131a38a088b8f4fe782a44163c0e79515e8f2ced28f416f60c extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 5];
        $filters = ["escape" => 7];
        $functions = ["path" => 22];

        try {
            $this->sandbox->checkSecurity(
                ['for'],
                ['escape'],
                ['path']
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
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453 = $this->env->getExtension("Drupal\\webprofiler\\Twig\\Extension\\ProfilerExtension");
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->enter($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "sites/all/modules/custom/events/templates/bootstrap_table.html.twig"));

        // line 1
        echo "<table class=\"table table-dark\">

\t<thead>
\t\t<tr>
\t\t\t";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["header"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 6
            echo "\t\t\t\t<th scope=\"col\">
\t\t\t\t\t";
            // line 7
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["i"]), "html", null, true);
            echo "
\t\t\t\t</th>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "\t\t</tr>
\t</thead>
\t<tbody>
\t\t";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["tr"]) {
            // line 14
            echo "\t\t\t<tr>
\t\t\t\t<th scope=\"row\">";
            // line 15
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["tr"], "id", [])), "html", null, true);
            echo "</th>
\t\t\t\t<td>";
            // line 16
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["tr"], "Title", [])), "html", null, true);
            echo "</td>
\t\t\t\t<td>";
            // line 17
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["tr"], "Participants", [])), "html", null, true);
            echo "</td>
\t\t\t\t<td>";
            // line 18
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["tr"], "Image", [])), "html", null, true);
            echo "</td>
\t\t\t\t<td>";
            // line 19
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["tr"], "Start_End_Date", [])), "html", null, true);
            echo "</td>
\t\t\t\t<td>";
            // line 20
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["tr"], "Category", [])), "html", null, true);
            echo "</td>
\t\t\t\t<td>
\t\t\t\t\t<a href=\"";
            // line 22
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("events.form.create", ["id" => $this->getAttribute($context["tr"], "id", [])]), "html", null, true);
            echo "\">Edit</a>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<a href=\"";
            // line 25
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->getPath("events.form.delete", ["cid" => $this->getAttribute($context["tr"], "id", [])]), "html", null, true);
            echo "\">Delete</a>
\t\t\t\t</td>
\t\t\t</tr>
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['tr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "\t</tbody>
</table>
";
        
        $__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453->leave($__internal_b8a44bb7188f10fa054f3681425c559c29de95cd0490f5c67a67412aafc0f453_prof);

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
        return array (  133 => 29,  123 => 25,  117 => 22,  112 => 20,  108 => 19,  104 => 18,  100 => 17,  96 => 16,  92 => 15,  89 => 14,  85 => 13,  80 => 10,  71 => 7,  68 => 6,  64 => 5,  58 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<table class=\"table table-dark\">

\t<thead>
\t\t<tr>
\t\t\t{% for i in header %}
\t\t\t\t<th scope=\"col\">
\t\t\t\t\t{{ i }}
\t\t\t\t</th>
\t\t\t{% endfor %}
\t\t</tr>
\t</thead>
\t<tbody>
\t\t{% for tr in rows %}
\t\t\t<tr>
\t\t\t\t<th scope=\"row\">{{ tr.id }}</th>
\t\t\t\t<td>{{ tr.Title }}</td>
\t\t\t\t<td>{{ tr.Participants }}</td>
\t\t\t\t<td>{{ tr.Image }}</td>
\t\t\t\t<td>{{ tr.Start_End_Date }}</td>
\t\t\t\t<td>{{ tr.Category }}</td>
\t\t\t\t<td>
\t\t\t\t\t<a href=\"{{ path('events.form.create', {'id': tr.id}) }}\">Edit</a>
\t\t\t\t</td>
\t\t\t\t<td>
\t\t\t\t\t<a href=\"{{ path('events.form.delete', {'cid': tr.id}) }}\">Delete</a>
\t\t\t\t</td>
\t\t\t</tr>
\t\t{% endfor %}
\t</tbody>
</table>
", "sites/all/modules/custom/events/templates/bootstrap_table.html.twig", "D:\\xampp\\htdocs\\drupal\\myFirstProject\\web\\sites\\all\\modules\\custom\\events\\templates\\bootstrap_table.html.twig");
    }
}
