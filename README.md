# Piper
Php piper

## Что это?

Piper это штука, которая должна помочь в обработке данных.

Идея piper'а возникла в ситуации когда нужно было импортировать одинаковые данные из множества разных форматов.

Есть немного базовых понятий

- Stream - это поток данных. Данные можно положить в поток и получить из потока.
- Pipe - это труба. Она может соеденить два потока. Подавая данные на вход в трубу они будут поступать на вход первого потока, преобразовываться и поступать на вход второго потока. Получение данных из трубы возвращает данные с выхода второго потока. Трубы являются частным случаем потоков, а следовательно их можно соединять друг с другом сколько угодно.

На базе этих двух понятий появляется возможность создать TransformStream, который является Stream'ом с Transform'ом.
Transform - это трансформация. Она применяется к каждому элементу поступающему на вход TransformStream'а. Transform возвращает Stream с результатами трансформации. Это позволяет для одного входящего элемента вернуть несколько выходных. Все содержимое Stream'а, который вернет Transform, будет помещено в выход TransformStream'а