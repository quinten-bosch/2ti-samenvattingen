## Elixir Introductie
---

### 01. Basics

#### Hello World

```elixir
IO.puts("Hello World!")
```

#### Functions
> Elixir requires functions to be part of a module.


We can add multiple functions in one module.
```elixir
defmodule Temperature do
  def kelvin_to_celsius(t) do
    t - 273.15
  end

  def celsius_to_kelvin(t) do
    t + 273.15
  end
end
```

#### Predicates

In other languages functions that return a boolean value are often named `Isodd`, `isMale`.
Elixir uses a `?` after the function name.

```exs
defmodule Numbers do
  def odd?(x) do
    rem(x, 2) != 0
  end
  # Shorter notation for single-expression functions
  def even?(x), do: rem(x, 2) == 0
end
```

#### Interpolated strings

```elixir
def greet(name), do:
    "Hello, #{name}"
```

#### If

The elixir language has no return statement.
```exs
defmodule Numbers do
  def abs(n) do
    if n >= 0 do
      n
    else
      -n
    end
  end
end
```

#### Conditionals

In other languages you can chain `if, elif, else` together. Elixir has a slightly different concept for this.

```exs
defmodule Numbers do
  def sign(n) do
    cond do
      n > 0 -> 1
      n < 0 -> -1
      true  -> 0
    end
  end
end
```
The `true` at the end of the condition has the equivalent of `else`

#### Arity
> The arity allows for a limited form of overloading: the same function name can be reused by multiple functions as long as they have a different arity.

```exs
def foo(), do: ...
def foo(x), do: ...
def foo(x, y), do: ...
```

#### Guards

Where a statically typed language like Java would prohibit you from calling a function which requires an `int` with a `string`, Elixir has no such checks.
This is why we use `guards`.

```exs
def sign(n) when is_number(n) do
    cond do
      n > 0 -> 1
      n < 0 -> -1
      true  -> 0
    end
end
```

#### Multiple Clauses
> As you can see, Elixir allows you to split the definition of a single function into multiple clauses, each specialized in its very own part of the input. When foo is called, the different clauses are looked at in turn. As soon as a clause is found whose guard evaluates to true, the search for a matching clause ends and its corresponding body is evaluated. If no such clause is found, an error ensues.

```exs
def foo(x) when is_number(x) and x > 0, do: # Deal with positive x
def foo(x) when is_number(x), do: # Deal with nonpositive x
```

> Elixir allows you to mention specific values in the parameter list. This causes the clause to only be considered whenever the corresponding argument is equal to that value.

```exs
def sign(x) when x > 0 , do: 1
def sign(x) when x < 0 , do: -1
def sign(0), do: 0
```

#### Private Functions

```exs
# Elixir
defmodule Foo do
    defp bar() do
        ...
    end
end
```

> Note the extra p in defp. That's all there is to it. Now bar is only accessible to other functions in the same module.

#### Default parameter values
> The syntax for default parameters is as follows:

```exs
# Elixir
def foo(x \\ 5) do
    ...
end
```
---